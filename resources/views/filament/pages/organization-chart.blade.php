<x-filament-panels::page>
    <style>
       .org-chart {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin: 40px;
        position: relative;
        background-color: #a8e6cf; /* A brighter, greener background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }




        .node {
            background-color: #ffffff;
            border: 2px solid #5a67d8; /* A college-related color */
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 20px;
            width: 220px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .node:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            background-color: #edf2f7; /* Light gray on hover */
        }

        .node::before,
        .node::after {
            content: "";
            position: absolute;
            top: -30px; /* Adjust for spacing */
            width: 2px;
            background: #5a67d8; /* Match border color */
        }

        .node::before {
            left: 50%;
            height: 30px;
            margin-left: -1px;
        }

        .node::after {
            right: 50%;
            height: 30px;
            margin-right: -1px;
        }

        .title {
            font-weight: bold;
            font-size: 1.5em;
            color: #5a67d8; /* College-related color */
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 1.1em;
            color: #333;
            margin-bottom: 10px;
        }

        .tagline {
            font-size: 0.9em;
            color: #555;
            font-style: italic;
            margin-top: 5px;
        }
    </style>

    <div class="org-chart">
        <div class="node">
            <div class="title">President</div>
            <div class="sub-title">Rey Rameses Jude S. Macalutas III</div>
            <div class="tagline">Leading the College of Arts and Sciences</div>
        </div>
        <div class="node">
            <div class="title">Vice President</div>
            <div class="sub-title">Brynth Dave Gunayan</div>
            <div class="tagline">Supporting Academic Excellence</div>
        </div>
        <div class="node">
            <div class="title">Secretary</div>
            <div class="sub-title">Kirk John Sieras</div>
            <div class="tagline">Organizing Events and Meetings</div>
        </div>
        <div class="node">
            <div class="title">Treasurer</div>
            <div class="sub-title">Maverick Fama</div>
            <div class="tagline">Managing Finances</div>
        </div>
        <div class="node">
            <div class="title">Public Information Officer</div>
            <div class="sub-title">Winston Mansueto</div>
            <div class="tagline">Communicating with the Public</div>
        </div>
    </div>
</x-filament-panels::page>
