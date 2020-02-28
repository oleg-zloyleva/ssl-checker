<?php

namespace App\Console\Commands;

use App\Jobs\CheckSites;
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
        foreach (Site::all() as $site) {
            CheckSites::dispatch($site);
        }
    }


}
