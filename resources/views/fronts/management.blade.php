@extends('layouts.app')
@section('content')

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 100vw;
                margin: 20px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
                border-radius: 10px;
            }

            th,
            td {
                padding: 15px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: #22574D !important;
                color: #ecf0f1;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            .container {
                padding-left: 50px;
                padding-right: 130px;
            }
            .orgoheading{
                font-size:45px;
                font-weight:600;
            }
                        center {
    padding: 30px;
}
        </style>

        <div class="container">
            <center><h1 clas="orgoheading">STAFF</h1></center>
            
            <table>
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Name of HOD</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>HRM</td>
                            <td>MUHAMMAD OWAIS ABBASI</td>
                            <td>0300-9256805</td>
                        </tr>
                        <tr>
                            <td>LAND</td>
                            <td>MUHAMMAD NAEEM KHAn</td>
                            <td>0343-3148831</td>
                        </tr>
                        <tr>
                            <td>ADVERTISEMENT</td>
                            <td>FAHEEM RAZA SHAIKH</td>
                            <td>0334-3352777</td>
                        </tr>
                        <tr>
                            <td>ACCOUNTS</td>
                            <td>MIMRAN SIYAL</td>
                            <td>0300-3296080</td>
                        </tr>
                        <tr>
                            <td>INFORMATION</td>
                            <td>RASHID ANSARI</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>EDUCATION</td>
                            <td>MUSHTAQ SOMROO</td>
                            <td>0300-9786364</td>
                        </tr>
                        <tr>
                            <td>ANTI ENCROACHMENT</td>
                            <td>FAHAD MUSTAFA</td>
                            <td>0316-2666363</td>
                        </tr>
                        <tr>
                            <td>AUDIT</td>
                            <td>MUHAMMAD AMAN QURASHI</td>
                            <td>0300-2633744</td>
                        </tr>
                        <tr>
                            <td>SENIOR ACCOUNTS</td>
                            <td>ABDUL NAEEM</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>EDUCATION</td>
                            <td>AYOUB JUZBANIL</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>ASSISTANT EXECUTIVE
                                ENGINEER B & R</td>
                            <td>SHAIKH MUHAMMAD ALAM</td>
                            <td>0322-2041247</td>
                        </tr>
                        <tr>
                            <td>DEPUTY DIRECTOR M & E</td>
                            <td>ADNAN AHMED</td>
                            <td>0311-2503245</td>
                        </tr>
                        <tr>
                            <td>DEPUTY DIRECTOR M & E</td>
                            <td>REHAN JABBAR</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>DIRECTOR SANITATION</td>
                            <td>AFTAB ALAM</td>
                            <td>0317-8394455</td>
                        </tr>
                        <tr>
                            <td>DIRECTOR PURCHASE</td>
                            <td>ZAHID IQBAL</td>
                            <td>0334-2701549</td>
                        </tr>


                </tbody>
            </table>
        </div>
@endsection
