<?php

namespace App\Jobs;

// use App\Models\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use App\Helpers\SmsApi;
// use App\Models\SmsSummary;
use Carbon\Carbon;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $smsApi;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SmsApi $smsApi)
    {
        $this->smsApi = $smsApi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $datas = [
            "sender" => $this->smsApi->getSender(),
            "message" => $this->smsApi->getMessage(),
            "recipients" => $this->smsApi->getRecipients(),
            "dlrurl" => $this->smsApi->getCallBackUrl(),
        ];

        $url = Config::get("app.SMS_INTOUCH_SEND_URL");


        $response = Http::withBasicAuth(
            $this->smsApi->getUsername(),
            $this->smsApi->getPassword()
        )
            ->retry(1, 1000)
            ->asForm()
            ->post($url, $datas);
        if ($response->ok()) {
            $json = $response->json();

            $success = $json['success'];
            if ($success) {
                $json = $json['details'][0];
                $status = $json["status"];
                $cost = $json["cost"];
                $messageid = $json["messageid"];
                $message = $json["message"];

                // Sms::create([
                //     "status" => $status,
                //     "cost" => $cost,
                //     "messageid" => $messageid,
                //     "message" =>  $message,
                //     "call_back_url" => $this->smsApi->getCallBackUrl(),
                //     "recipients" => $json["receipient"],
                //     "sender" => $this->smsApi->getSender(),
                //     "username" => $this->smsApi->getUsername(),
                //     'time' =>  now(),
                // ]);
            }
            $summary = $json['summary'] ?? false;


            if ($success && ($summary)) {
                // SmsSummary::create([
                //     "balance" => $summary["balance"],
                // ]);
            }
        }
    }
}
