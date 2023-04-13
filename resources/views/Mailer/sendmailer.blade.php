<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your reservation is now confirmed</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <style>
    @media screen {
      img {
        max-width: 100%;
      }
      td,
      th {
        box-sizing: border-box;
      }
      u~div .wrapper {
        min-width: 100vw;
      }
      a[x-apple-data-detectors] {
        color: inherit;
        text-decoration: none;
      }
      .all-font-roboto {
        font-family: Roboto, -apple-system, "Segoe UI", sans-serif !important;
      }
      .all-font-sans {
        font-family: -apple-system, "Segoe UI", sans-serif !important;
      }
    }
    @media (max-width: 600px) {
      .sm-inline-block {
        display: inline-block !important;
      }
      .sm-hidden {
        display: none !important;
      }
      .sm-leading-32 {
        line-height: 32px !important;
      }
      .sm-p-20 {
        padding: 20px !important;
      }
      .sm-py-12 {
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .sm-text-center {
        text-align: center !important;
      }
      .sm-text-xs {
        font-size: 12px !important;
      }
      .sm-text-lg {
        font-size: 18px !important;
      }
      .sm-w-1-4 {
        width: 25% !important;
      }
      .sm-w-3-4 {
        width: 75% !important;
      }
      .sm-w-full {
        width: 100% !important;
      }
    }
  </style>
  <style>
    @media (max-width: 600px) {
      .sm-dui17-b-t {
        border: solid #4299e1;
        border-width: 4px 0 0;
      }
    }
  </style>
</head>
@foreach ($orders as $data) 
    @if ($data->Status == "Accepted")
<body style="box-sizing: border-box; margin: 0; padding: 0; width: 40%; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #f5dbce;">
  <div style="display: none; line-height: 0; font-size: 0;">Hey Mr/Ms.{{$data->lname}},{{$data->fname}}, thanks for renting with us - your reservation is now confirmed ✔</div>
  <table class="wrapper all-font-sans" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="left" style="padding: 24px;" width="100%">
        <table class="sm-w-full" width="600" cellpadding="0" cellspacing="0" role="presentation">
          <tr>
            <td colspan="2" class="sm-inline-block" style="display: none;">
              <img src="https://images.unsplash.com/photo-1505577058444-a3dab90d4253?ixlib=rb-0.3.5&s=fed02ccbe457c9b8fc1f2cf76f30d755&w=600&h=400&q=80&fit=crop" alt="Double Room" style="border: 0; line-height: 100%; vertical-align: middle; border-top-left-radius: 4px; border-top-right-radius: 4px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);">
            </td>
          </tr>
          <tr>
            <td class="sm-hidden" style="padding-top: 40px; padding-bottom: 40px;" width="160">
              <img src="https://images.unsplash.com/photo-1505577058444-a3dab90d4253?ixlib=rb-0.3.5&s=fed02ccbe457c9b8fc1f2cf76f30d755&w=320&h=800&q=80&fit=crop" alt="Double room" style="border: 0; line-height: 100%; vertical-align: middle; border-top-left-radius: 4px; border-bottom-left-radius: 4px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);" width="160">
            </td>
            <td align="left" class="sm-p-20 sm-dui17-b-t" style="border-radius: 2px; padding: 40px; position: relative; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05); vertical-align: top; z-index: 50;" bgcolor="#ffffff" valign="top">
              <table width="0%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td width="80%">
                    <h1 class="sm-text-lg all-font-roboto" style="font-weight: 700; line-height: 100%; margin: 0; margin-bottom: 4px; font-size: 24px;">Tenant Receipt</h1>
                    <p class="sm-text-xs" style="margin: 0; color: #a0aec0; font-size: 14px;">Your reservation is now confirmed</p>
                  </td>
                </tr>
              </table>
              <div style="line-height: 32px;">&zwnj;</div>
              <table class="sm-leading-32" style="line-height: 28px; font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td class="sm-inline-block" style="color: #718096;" width="50%">Area</td>
                  <td class="sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->Area}} sqr</td>
                </tr>
                <tr>
                  <td class="sm-inline-block" style="color: #718096;" width="50%">Nights</td>
                  <td class="sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->TotalDays}}</td>
                </tr>
                <tr>
                  <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">Address</td>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->Address}}</td>
                </tr>
                <tr>
                  <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">City</td>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->City}}</td>
                </tr>
                <tr>
                  <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">State</td>
                  <td class="sm-w-3-4 sm-inline-block" style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->State}}</td>
                </tr>
              </table>
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="padding-top: 24px; padding-bottom: 24px;">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                  </td>
                </tr>
              </table>
              <table style="font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td class="sm-w-full sm-inline-block sm-text-center" width="40%">
                    <p class="all-font-roboto" style="margin: 0; margin-bottom: 4px; color: #a0aec0; font-size: 10px; text-transform: uppercase; letter-spacing: 1px;">Check-in</p>
                    <p class="all-font-roboto" style="font-weight: 600; margin: 0; color: #000000;">{{$data->CheckIn}}</p>
                  </td>
                  <td class="sm-w-full sm-inline-block sm-py-12" style="font-family: Menlo, Consolas, monospace; font-weight: 600; text-align: center; color: #cbd5e0; font-size: 18px; letter-spacing: -1px;" width="20%" align="center">&gt;&gt;&gt;</td>
                  <td class="sm-w-full sm-inline-block sm-text-center" style="text-align: right;" width="40%" align="right">
                    <p class="all-font-roboto" style="margin: 0; margin-bottom: 4px; color: #a0aec0; font-size: 10px; text-transform: uppercase; letter-spacing: 1px;">Check-out</p>
                    <p class="all-font-roboto" style="font-weight: 600; margin: 0; color: #000000;">{{$data->CheckOut}}</p>
                  </td>
                </tr>
              </table>
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="padding-top: 24px; padding-bottom: 24px;">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                  </td>
                </tr>
              </table>
              <table style="line-height: 28px; font-size: 14px;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="color: #718096;" width="50%">Price per night</td>
                  <td style="font-weight: 600; text-align: right;" width="50%" align="right">{{$data->Rent}}</td>
                </tr>
                <tr>
                  <td style="font-weight: 600; padding-top: 32px; color: #000000; font-size: 20px;" width="50%">Total</td>
                  <td style="font-weight: 600; padding-top: 32px; text-align: right; color: #68d391; font-size: 20px;" width="50%" align="right">${{$data->Total}}</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
   @elseif ($data->Status == "Canceled")
        <p>
            Transaction has been cancel please contact our landlord!!
        </p>
        @endif
    @endforeach
</body>
</html>