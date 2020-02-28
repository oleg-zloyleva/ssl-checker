<?php

namespace App\Jobs;

use App\Models\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\SslCertificate\SslCertificate;
use GuzzleHttp\Client;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\TgLog;
use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;

/**
 * @property  site
 * @property mixed user_id
 */
class CheckSites implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $site;
    protected $bot;
    protected $user_id;
    protected $loop;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($site)
    {
        $this->site = $site;
        $this->client = new Client;
        $botKey = env('TELEGRAM_BOT_KEY', '975970953:AAGTFmELX83_F-KdgIht_sHeFDw6mS3OUIQ');
        $this->user_id = env('TELEGRAM_USER_ID', '597150795');
        $this->loop = \React\EventLoop\Factory::create();
        $handler = new HttpClientRequestHandler($this->loop);
        $this->bot = new TgLog($botKey, $handler);

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $siteList = '';
            \Log::info($this->site->url);
            $url = 'https://' . $this->site->url . '/';
            if($expires = $this->certificate_expires_in($this->site)){
                //dump($expires);
                $siteList .= "$url expires in $expires days".PHP_EOL ;
            }
            if( ! $this->checkSiteIsWorking($this->site)){
                $siteList .= "$url not working" . PHP_EOL;
            }

        \Log::info($siteList);
        if (strlen($siteList) > 1) {
            $sendMessage = new SendMessage();
            $sendMessage->chat_id = $this->user_id;
            $sendMessage->text = $siteList;
            $this->bot->performApiRequest($sendMessage);
            $this->loop->run();
        }
    }

    private function certificate_expires_in(Site $domain)
    {
        //dump($domain->url);
        try {

            $certificate = SslCertificate::createForHostName($domain->url);
            $created = $certificate->validFromDate();
            $expires = $certificate->expirationDate();

            //dump($domain->url, $created, $expires);
            if($created && $expires){
                $domain->ssl_last_update = $created;
                $domain->ssl_expires_at = $expires;
                $domain->save();
                //dump($domain);
            }
            $expires = $certificate->expirationDate()->diffInDays(); // returns an int

            return $expires < 7 ? $expires : null;
        }catch (\Exception $e){
            dump($e->getMessage());
            return -1;
        }
        return -1;
    }

    private function checkSiteIsWorking($domain){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $domain->url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (curl_exec($ch) == false) {
            dump($domain->url. " not working");
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return true;
    }
}
