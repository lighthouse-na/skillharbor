<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizational Competency Profile</title>
    <style>
    @page {
        size: A4;

        @bottom-right {
            content: "Page "counter(page) " of "counter(pages);
        }

        @bottom-left {
            content: string(footerTitle);
        }
    }

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
        font-size: 11px;
        /* Reduced font size */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 8px;
    }

    .header,
    .section-title {
        text-align: left;
        margin: 10px;
        padding: 9px;
    }

    .header h1,
    .section-title h2 {
        margin: 0;
        color: #000035;
        font-size: 10px;
        /* Reduced font size */
    }

    .profile-section,
    .assessment-section {
        margin-bottom: 10px;
    }

    .profile-details,
    .qualification-list {
        margin-bottom: 5px;
    }

    .profile-details p,
    .qualification-item,
    .assessment-item {
        margin: 0;
        padding: 4px;


    }

    .profile-details strong,
    .qualification-item h3 {
        color: #000035;
        font-size: 9px;
        /* Reduced font size */
    }

    .footer {
        string-set: footerTitle content() width: 100%;
        float: left;
        height: 1em;
        padding-right: 0;
        font-size: 0.6em;
        padding-top: 0.4em;
    }

    .chart {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }

    .chart img {
        max-width: 30%;
        margin: 10px;
    }

    /* Additional CSS for other charts */
    .normal-chart img {
        max-width: 100%;
        margin: 20px 0;
    }

    .profile-details-table td {
        border-collapse: collapse;
        width: 100% border: 1px solid #000035;
        /* Added border to table */

    }

    .container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

.org-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.org-table th, .org-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.org-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.org-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.org-table tr:hover {
    background-color: #ddd;
}

.org-table th, .org-table td {
    padding: 12px 15px;
}




    .right-align {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
        justify-content: flex-end;
        -webkit-justify-content: flex-end;
        text-align: right;
    }
    </style>
</head>

<body>
    <div class="container">

        <h1>Organizational Competency Profile</h1>
        <section style="page-break-after: always;">
            <h2>About This Report</h2>
            <p>This skill audit report provides a detailed analysis of the current skill set within Telecom Namibia
                Limited. It highlights the areas of strength, identifies skill gaps, and suggests targeted training and
                development plans to address these gaps.</p>
            <p>The report is intended for use by company stakeholders, HR professionals, and management teams to make
                informed decisions about employee development and resource allocation. By understanding the existing
                capabilities and areas needing improvement, Telecom Namibia can better align its workforce with its
                strategic goals.</p>
            <p>Telecom Namibia remains committed to fostering a skilled and capable workforce to maintain its position
                as a leading ICT service provider in Namibia.</p>
        </section>

        <div class="profile-section">
            <div class="profile-details">
                <section>
                    <h2>Origin</h2>
                    <p>Telecom Namibia Limited is the national telecommunications operator, established in August 1992
                        and wholly owned by the Government of the Republic of Namibia. Telecom Namibia is functioning as
                        a commercialised company and as a subsidiary of its parent company, Namibia Post and Telecom
                        Holdings Limited.</p>
                </section>

                <section>
                    <h2>Scope</h2>
                    <p>Telecom Namibia is serving more than 619,000 (fixed and mobile) customers, with 916 employees and
                        annual revenue of more than N$ 1,4 Billion.</p>
                    <p>Telecom Namibia is a customer driven company that change telecommunication products and services
                        to the demand of its customers. Today customers want fast, reliable and advance services and
                        Telecom Namibia is there to make that possible.</p>
                    <p>Telecom Namibia runs the largest Digital Telecommunication Network in Namibia. The company is a
                        leading supplier of voice, text, data and video solutions.</p>
                </section>

                <section>
                    <h2>Vision Statement</h2>
                    <p>To be the preferred ICT service provider.</p>
                </section>

                <section>
                    <h2>Mission Statement</h2>
                    <p>To provide superior solutions and experience to our customers.</p>
                </section>

                <section>
                    <h2>Values</h2>
                    <ul>
                        <li>Simplicity</li>
                        <li>Innovation</li>
                        <li>Teamwork</li>
                        <li>Integrity</li>
                        <li>Sustainability</li>
                    </ul>
                </section>

                <section>
                    <h2>Strategic Pillars</h2>
                    <ul>
                        <li>Sustainable Growth</li>
                        <li>Customer Experience</li>
                        <li>Operational Efficiency</li>
                        <li>Performance Driven Culture</li>
                    </ul>
                </section>

                <section style="page-break-after: always;">
                    <h2>Community Service</h2>
                    <p>Telecom Namibia has contributed substantially to the community by creating employment
                        opportunities and by providing training and bursaries to large number of Namibians. Look through
                        some of the job opportunities available at Telecom Namibia.</p>
                    <p>Telecom Namibia is committed to providing services to under developed areas within Namibia.</p>
                </section>
            </div>
        </div>
        <div class="container" >
            <div class="org-chart" style="page-break-after: always;">
                <h2>Organisational Structure</h2>

                <div class="container">
                <div>
  <!-- BEGIN: Tree box lv 1 -->
  <div class="px-30 py-30">
    <div class="mb-15">
      <span>Box Size</span>
      <div class="slidecontainer">
        <input type="range" min="110" max="165" value="130" class="slider" id="slider">
      </div>
    </div>
    <div class="mb-15">
      <span>Box Gap Y</span>
      <div class="slidecontainer">
        <input type="range" min="10" max="65" value="62" class="slider" id="slider1">
      </div>
    </div>
    <div class="mb-15">
      <span>Box Gap X</span>
      <div class="slidecontainer">
        <input type="range" min="5" max="65" value="60" class="slider" id="slider2">
      </div>
    </div>
    <div class="mb-15">
      <span>Font Size</span>
      <div class="slidecontainer">
        <input type="range" min="14" max="22" value="16" class="slider" id="slider3">
      </div>
    </div>
  </div>
  <div class="tree-box-main-wrapper py-30">
    <div class="tree-box-wrapper tree-box-parent-l1">
      <div class="tree-box-inner-wrapper has-child">
        <div class="tree-box" style="background-color: #34495e">
          <p class="box-title">Total Application Received</p>
          <h2 class="box-count">100</h2>
        </div>
        <!-- BEGIN: Tree box lv 2 -->
        <div class="tree-box-wrapper tree-box-parent-l2">
          <div class="tree-box-inner-wrapper has-child">
            <div class="tree-box" style="background-color: #16a085">
              <p class="box-title">
                In principle Approval Issued
              </p>
              <h2 class="box-count">75</h2>
            </div>
            <!-- BEGIN: Tree box lv 3 -->
            <div class="tree-box-wrapper tree-box-parent-l2">
              <div class="tree-box-inner-wrapper has-child">
                <div class="tree-box" style="background-color: #2ecc71">
                  <p class="box-title">Approved</p>
                  <h2 class="box-count">70</h2>
                </div>
                <!-- BEGIN: Tree box lv 4 -->
                <div class="tree-box-wrapper tree-box-parent-l2">
                  <div class="tree-box-inner-wrapper">
                    <div class="tree-box" style="background-color: #476583">
                      <p class="box-title">Claim Received</p>
                      <h2 class="box-count">30</h2>
                    </div>
                  </div>
                </div>
                <!-- END: Tree box lv 4 -->
              </div>
              <div class="tree-box-inner-wrapper">
                <div class="tree-box" style="background-color: #e74c3c">
                  <p class="box-title">Rejected</p>
                  <h2 class="box-count">5</h2>
                </div>
              </div>
            </div>
            <!-- END: Tree box lv 3 -->
          </div>
          <div class="tree-box-inner-wrapper has-child">
            <div class="tree-box" style="background-color: #f1c40f">
              <p class="box-title">In principle Pending</p>
              <h2 class="box-count">25</h2>
            </div>
            <!-- BEGIN: Tree box lv 3 -->
            <div class="tree-box-wrapper tree-box-parent-l2">
              <div class="tree-box-inner-wrapper">
                <div class="tree-box" style="background-color: #d3870e">
                  <p class="box-title">Query Raised</p>
                  <h2 class="box-count">20</h2>
                </div>
              </div>
              <div class="tree-box-inner-wrapper">
                <div class="tree-box" style="background-color: #3498db">
                  <p class="box-title">Under scrutiny</p>
                  <h2 class="box-count">5</h2>
                </div>
              </div>
            </div>
            <!-- END: Tree box lv 3 -->
          </div>
        </div>
        <!-- END: Tree box lv 2 -->
      </div>
    </div>
  </div>
  <!-- END: Tree box lv 1 -->
</div>

<!-- BEGIN : kjv logo -->
<a href="https://codepen.io/krunal5281" class="kjv-logo-link" target="_blank" title="My Codepen Profile">
  <svg xmlns="http://www.w3.org/2000/svg" width="3096" height="3096" viewBox="0 0 3096 3096" fill="none" class="kjv-logo">
    <rect width="3096" height="3096" fill="black" id="kjvOuterFill" />
    <g id="kjvMainGroup">
      <path id="kjvTringleRight" d="M2811 1573.5L1977 2408V745L2811 1573.5Z" fill="white" stroke="white" stroke-width="172" />
      <path id="kjvTringleLeft" d="M285 1578L1115 748V2408L285 1578Z" fill="white" stroke="white" stroke-width="172" />
      <g id="kjvLetters">
        <path d="M1344 909.304V571H1710L1344 909.304ZM1344 909.304V1124H1731L1502.5 783.094" stroke="white" stroke-width="62" />
        <path d="M1345 1643.11V1847H1759V1304H1394L1759 1626.5" stroke="white" stroke-width="62" />
        <path id="Vector 8" d="M1743.5 2017H1356.5L1552.5 2526L1743.5 2017Z" fill="#000" stroke="white" stroke-width="62" />
      </g>
    </g>
  </svg>
</a>
</div>
            </div>







            <div>
                <div class="chart">
                    <h3 class="section-title">Company Insights</h3>


                    <img src="https://quickchart.io/chart?width=500&height=300&c={{ $ageUrl }}" alt="Age Chart" />
                    <img src="https://quickchart.io/chart?width=500&height=300&c={{ $genderUrl }}" alt="Gender Chart" />
                    <img src="https://quickchart.io/chart?width=500&height=300&c={{ $typeUrl }}" alt="Type Chart" />


                </div>
                <div class="chart">
                    <h3 class="section-title">Company Skill Audit Report</h3>

                    <img src="https://quickchart.io/chart?width=500&height=300&c={{ $skillUrl }}" />
                </div>

            </div>

            <div class="footer">
                Generated by SkillHarbor
            </div>

        </div>

</body>

</html>