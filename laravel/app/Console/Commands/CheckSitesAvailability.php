<?php

namespace App\Console\Commands;

use App\Models\Site;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use \unreal4u\TelegramAPI\HttpClientRequestHandler;
use \unreal4u\TelegramAPI\TgLog;
use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use Spatie\SslCertificate\SslCertificate;


class CheckSitesAvailability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:ssl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command checks availability of ssl on listed sites';

    protected $bot;
    protected $user_id;
    protected $loop;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct();
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
        foreach (Site::all() as $site) {
            //dump($site->url);
            $url = 'https://' . $site->url . '/';
            if($expires = $this->certificate_expires_in($site)){
                //dump($expires);
                $siteList .= "$url expires in $expires days".PHP_EOL ;
            }
            if( ! $this->checkSiteIsWorking($site)){
                $siteList .= "$url not working" . PHP_EOL;
            }
        }
        //dump($siteList);
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
        curl_setopt($ch, CURLOPT_HEADER, 0);
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
