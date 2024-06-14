<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisational Report</title>
    <link rel="stylesheet" href="styles.css">
    <style>

:root {
  #035392: #035392;
  --light-blue: #ced5e1;
  --bar-blue: #4b97f5;
}

@page {
  size: auto;

  margin: 10mm;
}

@media print {
  body {
    background-color: transparent;
    padding: 4;
    margin: 4;
  }

  .letter section {
    -moz-column-break-inside: avoid;
    break-inside: avoid;
  }
}

html,
body {
  font-family: "Inter", sans-serif;
  -webkit-print-color-adjust: exact;
  font-size: 12px;
}

.letter {
  width: 8.5in;
  height: 11in;
}

.excode {
  border-left-color:#035392;
}

.qm-logo {
  height: 18px;
  padding: 6px 0;
  box-sizing: content-box;
}

.overview .score {
  background-color:#035392;
}

.overview .grid-data .label {
  font-weight: 400;
}

.overview .grid-data .data {
  white-space: nowrap;
}

.overview .week-52-slider {
  max-width: 50%;
  -moz-appearance: none;
  appearance: none;
  -webkit-appearance: none;
  background: #035392;
  outline: none;
  opacity: 0.7;
  transition: opacity 0.15s ease-in-out;
}

.overview .week-52-slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #467eff;
  cursor: pointer;
}

.overview .week-52-slider::-moz-range-thumb {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #467eff;
  cursor: pointer;
}

.overview .chart-overlay::after {
  content: "";
  background-image: linear-gradient(to bottom, #d6d6d6 1px, transparent 1px);
  background-size: 20px 20px;
  width: 100%;
  height: 100%;
  position: inherit;
  top: 0;
  right: 0;
  border-left: 1px solid lightgray;
  border-right: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
}

.overview .chart-overlay .caption {
  color: #707070;
}

/* utilities */

.cr-bg-primary {
  background-color: var(#035392);
}

.cr-bar-blue {
  background-color: #035392;
}

.cr-text-gray {
  color: #979797;
}

.divider {
  height: 1px;
  background-color: #ccc;
  border: none;
}

    </style>
</head>
<body class="bg-gray-600">
    <section class="letter relative mx-auto bg-white">
      <div class="header flex justify-between py-2 px-12 border-b border-gray-300">
        <div class="flex flex-col">
          <h1 class="text-2xl font-bold pb-1">Microsoft Corporation (MSFT)</h1>
          <div class="excode border-l-4 pl-2 leading-tight"><span class="font-semibold">NASDAQ</span> | Computers and
            Technology Sector</div>
        </div>
        <div class="flex flex-col items-end"><img class="qm-logo" src="https://quotemedia.com/assets/img/quotemedia_large_company_logo.png" alt="logo">
          <div><span class="font-extrabold">Stock Report</span> | <span class="font-medium">May 02 2021</span></div>
        </div>
      </div>
      <div class="overview pt-12 px-12">
        <div class="flex justify-between">
          <div class="grid-data font-semibold grid grid-cols-11 grid-rows-2 gap-x-2 gap-y-2 text-xs w-5/6">
            <div class="col-span-2 flex items-end">
              <div><span class="text-2xl font-bold">251.33</span><span class="text-sm ml-1">USD</span></div>
            </div>
            <div class="flex flex-col justify-end"><span class="label">Cap</span><span class="data">1.94T</span></div>
            <div class="col-span-2 flex flex-col justify-end pl-8"><span class="label">Dividend</span><span class="data">2.24</span></div>
            <div class="col-span-2 flex flex-col justify-end"><span class="label">Div Date</span><span class="data">Apr. 27, 2021</span></div>
            <div class="col-span-3 flex flex-col justify-end pl-8"><span class="label">Earnings Date</span><span class="data">Apr. 27, 2021 - May 03, 2021</span></div>
            <div class="flex flex-col justify-end"><span class="label">PE (FWD)</span><span class="data">32.26</span></div>
            <div class="col-span-2 flex flex-col"><span class="label">52 Week:</span><span class="data">176.60 - 263.19</span><input class="week-52-slider h-2 rounded-lg mt-2" readonly="1" type="range" min="1" max="100" value="50"></div>
            <div class="flex flex-col justify-end"><span class="label">Avg Vol.</span><span class="data">30,382,937</span></div>
            <div class="col-span-2 flex flex-col justify-end pl-8"><span class="label">Div Yield</span><span class="data">162.30 - 257.49</span></div>
            <div class="col-span-2 flex flex-col justify-end"><span class="label">Ex-Div Date</span><span class="data">Apr.27, 2021 - May 03, 2021</span></div>
            <div class="col-span-3 flex flex-col justify-end pl-8"><span class="label">EPS</span><span class="data">5.76</span></div>
            <div class="flex flex-col justify-end"><span class="label">PE (TTM)</span><span class="data">34.19</span></div>
          </div>
          <div class="score flex flex-col items-center justify-center text-white text-xs ml-8 py-1 px-4"><span class="font-bold text-4xl">73</span><span class="mb-1">Composite Score</span>
            <hr class="text-blue-200"><span class="mt-1">65 Industry Avg.</span>
          </div>
        </div>
        <div class="flex mt-10 gap-x-12">
          <div class="chart self-start relative w-1/3"><img src="https://app.quotemedia.com/quotetools/getChart?webmasterId=101894&amp;chbgch=ffffff&amp;chcon=off&amp;chfrmon=off&amp;chgrdon=off&amp;chbdron=off&amp;chln=4b97f5&amp;chdon=off&amp;chfill=4b97f5&amp;chfill2=ff4b97f5&amp;symbol=msft&amp;chscale=5y&amp;chton=off&amp;chwid=305&amp;chhig=215&amp;chtype=Mountain&amp;chlowwh=10&amp;chfnts=10&amp;svg=true&amp;lang=en&amp;chtcol=cccccc&amp;disableSid=false&amp;a2accessibility=false&amp;locale=en" alt="chart">
            <div class="chart-overlay absolute top-2 left-1 bottom-6 right-10 px-2">
              <div class="text-2xl font-semibold">MSFT</div>
              <div class="caption text-xs leading-6 -pb-0.5">Nasdaqgs - NasdaqGS Real Time Price</div>
              <div class="caption text-xs leading-6 -pb-0.5">March 1st, 2020 4:00 PM EST</div>
              <div class="caption text-xs leading-6 -pb-0.5">Delayed Data</div>
            </div>
          </div>
          <div class="flex flex-col items-start text-sm w-2/3"><img class="w-32" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31" alt="">
            <p class="py-4 mb-2 font-medium leading-5">Microsoft Corporation develops, licenses, and supports software, services, devices, and
              solutions worldwid . Its Productivity and Business Processes segment offers Office, Exchange,
              SharePoint,
              Microsoft Teams, Office 365 Security and Compliance, and Skype for Business, as well as related
              Client Access Licenses (CAL); Skype, Outlook.com, OneDrive, and LinkedIn; and Dynamics 365, a
              set of cloud-based and on-premises business solutions for small and medium businesses, large
              organizations, and divisions of enterprises</p>
            <div class="grid grid-cols-3 grid-rows-2 gap-y-4 w-full text-sm">
              <div class="flex flex-col"><span>Address:</span>
                <div class="font-medium"><span>One Microsoft Way</span><br><span>Redmond, WA 98052-6399</span><br><span>United States</span></div>
              </div>
              <div class="flex flex-col"><span>Phone:</span><span class="data font-medium">425-882-8080</span></div>
              <div class="flex flex-col"><span>CEO:</span><span class="data font-medium">Stay Nadella</span></div>
              <div class="flex flex-col"><span>URL:</span><span class="data font-medium">http://www.microsoft.com</span></div>
              <div class="flex flex-col"><span>Email:</span><span class="data font-medium">msft@microsoft.com</span></div>
              <div class="flex flex-col"><span>Employees::</span><span class="data font-medium">163,000</span></div>
            </div>
          </div>
        </div>
        <hr class="divider mb-6">
        <div class="text-xl font-semibold">Composite Score Trend</div>
        <div><svg class="inline mr-2" height="8" width="8">
            <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
          </svg><span class="data">MSFT</span><svg class="inline ml-6 mr-2" height="8" width="8">
            <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
          </svg><span class="data">Industry</span></div>
        <div class="flex mt-6 h-40">
          <div class="flex flex-col text-xs gap-y-3 cr-text-gray font-medium"><span>100</span><span>75</span><span>50</span><span>25</span><span>0</span></div>
          <div class="flex justify-around flex-grow items-end w-full mt-2 space-x-2 border-b border-gray-300 mb-6">
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2016</div>
            </div>
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2017</div>
            </div>
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2018</div>
            </div>
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2019</div>
            </div>
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2020</div>
            </div>
            <div class="relative h-full flex items-end justify-center group gap-x-1">
              <div class="flex justify-center w-4 cr-bar-blue rounded-t-sm" style="height: 80%;"></div>
              <div class="flex justify-center w-4 bg-gray-300 rounded-t-sm" style="height: 60%;"></div>
              <div class="py-2 text-sm">
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#4b97f5"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
                <div><svg class="inline" height="8" width="8">
                    <circle cx="4" cy="4" r="2" fill="#cdd5e1"></circle> Sorry, your browser does not support inline SVG.
                  </svg><span>73.69</span></div>
              </div>
              <div class="absolute -bottom-7 left-0 cr-text-gray text-sm font-semibold">2021</div>
            </div>
          </div>
        </div>
        <hr class="divider my-8"><!-- Competitors-->
        <div class="text-xl font-semibold">Competitors</div>
        <table class="w-full border-collapse">
          <thead>
            <tr>
              <th class="min-w-16 py-4 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-left">Symbol</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">Market Cap</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">Revenue</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">Profit Margin</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">PE</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">Composite Score</th>
              <th class="py-4 bg-grey-lightest font-medium text-sm text-grey-dark border-b border-grey-light text-center">TTM</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-left">
              <td class="py-1 border-t border-grey-light"><span class="text-grey-lighter py-1 text-xs">MSFT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">34t</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">256.3TT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">52</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">32</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">72</span></td>
              <td class="border-t border-grey-light text-center">
                <div class="w-20 mx-auto"><canvas class="ttm" data-data="60,70,80,72,75,85,65"></canvas></div>
              </td>
            </tr>
            <tr class="text-left">
              <td class="py-1 border-t border-grey-light"><span class="text-grey-lighter py-1 text-xs">MSFT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">34t</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">256.3TT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">52</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">32</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">72</span></td>
              <td class="border-t border-grey-light text-center">
                <div class="w-20 mx-auto"><canvas class="ttm" data-data="60,70,80,72,75,85,65"></canvas></div>
              </td>
            </tr>
            <tr class="text-left">
              <td class="py-1 border-t border-grey-light"><span class="text-grey-lighter py-1 text-xs">MSFT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">34t</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">256.3TT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">52</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">32</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">72</span></td>
              <td class="border-t border-grey-light text-center">
                <div class="w-20 mx-auto"><canvas class="ttm" data-data="60,70,80,72,75,85,65"></canvas></div>
              </td>
            </tr>
            <tr class="text-left">
              <td class="py-1 border-t border-grey-light"><span class="text-grey-lighter py-1 text-xs">MSFT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">34t</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">256.3TT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">52</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">32</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">72</span></td>
              <td class="border-t border-grey-light text-center">
                <div class="w-20 mx-auto"><canvas class="ttm" data-data="60,70,80,72,75,85,65"></canvas></div>
              </td>
            </tr>
            <tr class="text-left">
              <td class="py-1 border-t border-grey-light"><span class="text-grey-lighter py-1 text-xs">MSFT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">34t</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">256.3TT</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">52</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">32</span></td>
              <td class="py-1 border-t border-grey-light text-center"><span class="text-grey-lighter py-1 text-xs">72</span></td>
              <td class="border-t border-grey-light text-center">
                <div class="w-20 mx-auto"><canvas class="ttm" data-data="60,70,80,72,75,85,65"></canvas></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="footer absolute bottom-3 px-12 pt-6 w-full tracking-wide flex justify-between text-sm border-t border-gray-300">
        <div class="flex flex-col gap-y-2"><span class="font-medium">MSFT Microsoft Corporation | Nasdaq</span><span>@2021 QuoteMedia Inc. All rights reserved.</span></div>
        <div><span>Page 1 of 8</span></div>
        <div><img class="qm-logo-in-footer inline mr-1" style="width: 100px;" src="https://quotemedia.com/assets/img/quotemedia_large_company_logo.png" alt="logo">|<span class="font-medium ml-1">Stock Report</span></div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    <script src="/js/chart.js" type="module"></script>
  </body>
<script>
const makeTTM = function (ctx, data) {
  new Chart(ctx, {
    type: "line",
    data: {
      labels: ["1", "2", "3", "4", "5", "6", "7"],
      datasets: [
        {
          data,
          fill: true,
          borderColor: "#4b97f5",
          borderWidth: 1,
          backgroundColor: "#e1edfd",
          pointBorderColor: "#4b97f5", // blue point border
          pointBackgroundColor: "white", // wite point fill
          pointBorderWidth: 1, // point border width
          radius: 1.5,
        },
      ],
    },
    options: {
      layout: {
        padding: -40
      },
      plugins: {
        legend: {
          display: false,
        },
      },
      responsive: true,
      scales: {
        x: {
          display: false,
          grid: {
            display: false,
          },
        },
        y: {
          display: false,
          grid: {
            display: false,
          },
          min: 0,
          max: 100,
        },
      },
    },
  });
};


document.querySelectorAll("canvas.ttm").forEach((ctx) => {
  const data = ctx.dataset.data.split(",");
  makeTTM(ctx, data);
});
</script>
  </html>
