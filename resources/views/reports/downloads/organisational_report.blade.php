<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizational Competency Profile</title>
    <style>
    @page {
        size: A4;
        margin: mm;

        @bottom-right {
            content: "Page "counter(page) " of "counter(pages);
        }


    }

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
        font-size: 12px;
    }

    h1,
    h2,
    h3 {
        color: #2c3e50;
    }

    .header,
    .section-title {
        text-align: left;
        margin: 20px 0;
        padding: 0 20px;
    }

    .header h1,
    .section-title h2 {
        margin: 0;
        font-size: 24px;
    }

    .profile-section,
    .assessment-section {
        margin-bottom: 30px;
    }

    .profile-details,
    .qualification-list {
        margin-bottom: 20px;
    }

    .profile-details p,
    .qualification-item,
    .assessment-item {
        margin: 0;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
    }

    .profile-details strong,
    .qualification-item h3 {
        font-size: 14px;
    }



    .table-container {
        padding: 0 10px;
    }

    .organization-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 8px;
        margin: 0 auto;
    }

    .organization-table th,
    .organization-table td {
        border: 1px solid #ddd;
        text-align: left;
    }

    .organization-table th {
        background-color: #2c3e50;
        color: #fff;
    }

    .division-row {
        background-color: #34495e;
        color: #fff;
        font-weight: bold;
    }

    .department-row {
        background-color: #ecf0f1;
    }

    .employee-row {
        background-color: #fff;
    }

    ul {
        padding-left: 20px;
    }

    ul li {
        margin-bottom: 5px;
    }

    .chart {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }

    .chart img {
        max-width: 30%;
        margin: 8px;
    }

    /* Additional CSS for other charts */
    .normal-chart img {
        max-width: 100%;
        margin: 20px 0;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Organizational Competency Profile</h1>
    </div>

    <section class="section-title">
        <h2>About This Report</h2>
    </section>
    <p class="table-container">This skill audit report provides a detailed analysis of the current skill set within
        Telecom Namibia Limited. It highlights the areas of strength, identifies skill gaps, and suggests targeted
        training and development plans to address these gaps.</p>
    <p class="table-container">The report is intended for use by company stakeholders, HR professionals, and management
        teams to make informed decisions about employee development and resource allocation. By understanding the
        existing capabilities and areas needing improvement, Telecom Namibia can better align its workforce with its
        strategic goals.</p>
    <p class="table-container">Telecom Namibia remains committed to fostering a skilled and capable workforce to
        maintain its position as a leading ICT service provider in Namibia.</p>

    <div class="profile-section">
        <section class="section-title">
            <h2>Origin</h2>
        </section>
        <p class="table-container">Telecom Namibia Limited is the national telecommunications operator, established in
            August 1992 and wholly owned by the Government of the Republic of Namibia. Telecom Namibia is functioning as
            a commercialised company and as a subsidiary of its parent company, Namibia Post and Telecom Holdings
            Limited.</p>

        <section class="section-title">
            <h2>Scope</h2>
        </section>
        <p class="table-container">Telecom Namibia is serving more than 619,000 (fixed and mobile) customers, with 916
            employees and annual revenue of more than N$ 1,4 Billion.</p>
        <p class="table-container">Telecom Namibia is a customer driven company that change telecommunication products
            and services to the demand of its customers. Today customers want fast, reliable and advance services and
            Telecom Namibia is there to make that possible.</p>
        <p class="table-container">Telecom Namibia runs the largest Digital Telecommunication Network in Namibia. The
            company is a leading supplier of voice, text, data and video solutions.</p>

        <section class="section-title">
            <h2>Vision Statement</h2>
        </section>
        <p class="table-container">To be the preferred ICT service provider.</p>

        <section class="section-title">
            <h2>Mission Statement</h2>
        </section>
        <p class="table-container">To provide superior solutions and experience to our customers.</p>

        <section class="section-title">
            <h2>Values</h2>
        </section>
        <ul>
            <li>Simplicity</li>
            <li>Innovation</li>
            <li>Teamwork</li>
            <li>Integrity</li>
            <li>Sustainability</li>
        </ul>

        <section class="section-title">
            <h2>Strategic Pillars</h2>
        </section>
        <ul>
            <li>Sustainable Growth</li>
            <li>Customer Experience</li>
            <li>Operational Efficiency</li>
            <li>Performance Driven Culture</li>
        </ul>

        <section class="section-title">
            <h2>Community Service</h2>
        </section>
        <p class="table-container">Telecom Namibia has contributed substantially to the community by creating employment
            opportunities and by providing training and bursaries to a large number of Namibians. Look through some of
            the job opportunities available at Telecom Namibia.</p>
        <p class="table-container">Telecom Namibia is committed to providing services to underdeveloped areas within
            Namibia.</p>
    </div>

    <div class="table-container" style="page-break-after: always;">
        <section class="section-title">
            <h2>Organisational Structure</h2>
        </section>
        <div class="chart">


            <img src="https://quickchart.io/chart?width=500&height=300&c={{ $ageUrl }}" alt="Age Chart" />
            <img src="https://quickchart.io/chart?width=500&height=300&c={{ $genderUrl }}" alt="Gender Chart" />
            <img src="https://quickchart.io/chart?width=500&height=300&c={{ $typeUrl }}" alt="Type Chart" />
        </div>
        <table class="organization-table">
            <thead>
                <tr>
                    <th>Division</th>
                    <th>Department</th>
                    <th>Number of Employees</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisions as $division)
                <tr class="division-row">
                    <td>{{ $division->division_name }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($division->departments as $department)
                <tr class="department-row">
                    <td></td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{$department->employees->count()}}</td>
                </tr>

                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="chart">
    <section class="section-title">
            <h2>Company Skill Audit Report</h2>
        </section>
        <img src="https://quickchart.io/chart?width=500&height=300&c={{ $skillUrl }}" />
    </div>

</body>

</html>