<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .JS-example code { display: none; }
                    body .content .Laravel-example code { display: none; }
                    body .content .DartPad-example code { display: none; }
                    body .content .Dio-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://45.245.146.33:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.3.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.3.0.js") }}"></script>

</head>

<body data-languages="[&quot;JS&quot;,&quot;Laravel&quot;,&quot;DartPad&quot;,&quot;Dio&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="JS">JS</button>
                                            <button type="button" class="lang-button" data-language-name="Laravel">Laravel</button>
                                            <button type="button" class="lang-button" data-language-name="DartPad">DartPad</button>
                                            <button type="button" class="lang-button" data-language-name="Dio">Dio</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-auth-login">
                                <a href="#endpoints-POSTapi-v1-auth-login">Authenticate user and return access token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-student-available-exam">
                                <a href="#endpoints-GETapi-v1-student-available-exam">Student gets available exam if session exists
Student can only start exam during exam time window</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-student-exam-submit">
                                <a href="#endpoints-POSTapi-v1-student-exam-submit">Submit complete exam with all answers at once</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-student-exam-results">
                                <a href="#endpoints-GETapi-v1-student-exam-results">GET api/v1/student/exam/results</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-teacher-scan-qr-create-session">
                                <a href="#endpoints-POSTapi-v1-teacher-scan-qr-create-session">Teacher scans QR code with student_id and creates session</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-teacher-my-schools">
                                <a href="#endpoints-GETapi-v1-teacher-my-schools">GET api/v1/teacher/my-schools</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-students">
                                <a href="#endpoints-GETapi-v1-admin-students">List students with filters and pagination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-students">
                                <a href="#endpoints-POSTapi-v1-admin-students">Create student account (School Admin only)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-students--id-">
                                <a href="#endpoints-GETapi-v1-admin-students--id-">Show a student's details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-students--id-">
                                <a href="#endpoints-PUTapi-v1-admin-students--id-">Update student (School Admin only)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-students--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-students--id-">Remove a student (soft-delete) and associated user.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-teachers">
                                <a href="#endpoints-GETapi-v1-admin-teachers">List all teachers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-teachers">
                                <a href="#endpoints-POSTapi-v1-admin-teachers">Create teacher account (Ministry Admin only)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-teachers--id-">
                                <a href="#endpoints-GETapi-v1-admin-teachers--id-">Show teacher details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-teachers--id-">
                                <a href="#endpoints-PUTapi-v1-admin-teachers--id-">Update teacher information</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-teachers--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-teachers--id-">Delete teacher</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-teachers--teacherId--assign-schools">
                                <a href="#endpoints-POSTapi-v1-admin-teachers--teacherId--assign-schools">POST api/v1/admin/teachers/{teacherId}/assign-schools</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-teachers-by-school--schoolId-">
                                <a href="#endpoints-GETapi-v1-admin-teachers-by-school--schoolId-">Get teachers by school</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-teacher-school-assignments">
                                <a href="#endpoints-GETapi-v1-admin-teacher-school-assignments">GET api/v1/admin/teacher-school-assignments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-teacher-school-assignments">
                                <a href="#endpoints-POSTapi-v1-admin-teacher-school-assignments">POST api/v1/admin/teacher-school-assignments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-teacher-school-assignments--id-">
                                <a href="#endpoints-GETapi-v1-admin-teacher-school-assignments--id-">GET api/v1/admin/teacher-school-assignments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-teacher-school-assignments--id-">
                                <a href="#endpoints-PUTapi-v1-admin-teacher-school-assignments--id-">PUT api/v1/admin/teacher-school-assignments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-teacher-school-assignments--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-teacher-school-assignments--id-">DELETE api/v1/admin/teacher-school-assignments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exams">
                                <a href="#endpoints-GETapi-v1-admin-exams">GET api/v1/admin/exams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-exams">
                                <a href="#endpoints-POSTapi-v1-admin-exams">POST api/v1/admin/exams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exams--id-">
                                <a href="#endpoints-GETapi-v1-admin-exams--id-">GET api/v1/admin/exams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-exams--exam_id-">
                                <a href="#endpoints-PUTapi-v1-admin-exams--exam_id-">PUT api/v1/admin/exams/{exam_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-exams--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-exams--id-">DELETE api/v1/admin/exams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-exams--id--duplicate">
                                <a href="#endpoints-POSTapi-v1-admin-exams--id--duplicate">POST api/v1/admin/exams/{id}/duplicate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exams--id--statistics">
                                <a href="#endpoints-GETapi-v1-admin-exams--id--statistics">GET api/v1/admin/exams/{id}/statistics</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-subjects">
                                <a href="#endpoints-GETapi-v1-admin-subjects">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-subjects">
                                <a href="#endpoints-POSTapi-v1-admin-subjects">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-subjects--id-">
                                <a href="#endpoints-GETapi-v1-admin-subjects--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-subjects--id-">
                                <a href="#endpoints-PUTapi-v1-admin-subjects--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-subjects--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-subjects--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exam-questions">
                                <a href="#endpoints-GETapi-v1-admin-exam-questions">Display a paginated listing of exam questions.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-exam-questions">
                                <a href="#endpoints-POSTapi-v1-admin-exam-questions">Store a newly created exam question.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exam-questions--id-">
                                <a href="#endpoints-GETapi-v1-admin-exam-questions--id-">Display the specified exam question.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-exam-questions--id-">
                                <a href="#endpoints-PUTapi-v1-admin-exam-questions--id-">Update the specified exam question in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-exam-questions--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-exam-questions--id-">Remove the specified exam question from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exams--id--questions">
                                <a href="#endpoints-GETapi-v1-admin-exams--id--questions">Get sections (with questions) and unsectioned questions of an exam.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exam-sections">
                                <a href="#endpoints-GETapi-v1-admin-exam-sections">GET api/v1/admin/exam-sections</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-exam-sections">
                                <a href="#endpoints-POSTapi-v1-admin-exam-sections">POST api/v1/admin/exam-sections</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-exam-sections--id-">
                                <a href="#endpoints-GETapi-v1-admin-exam-sections--id-">GET api/v1/admin/exam-sections/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-exam-sections--id-">
                                <a href="#endpoints-PUTapi-v1-admin-exam-sections--id-">PUT api/v1/admin/exam-sections/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-exam-sections--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-exam-sections--id-">DELETE api/v1/admin/exam-sections/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-school-admins">
                                <a href="#endpoints-GETapi-v1-admin-school-admins">List paginated school admins</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-school-admins">
                                <a href="#endpoints-POSTapi-v1-admin-school-admins">Create school admin: create user first then create school admin profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-school-admins--id-">
                                <a href="#endpoints-GETapi-v1-admin-school-admins--id-">Show school admin details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-school-admins--id-">
                                <a href="#endpoints-PUTapi-v1-admin-school-admins--id-">Update school admin and optionally its user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-school-admins--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-school-admins--id-">Delete school admin and its user (soft delete user)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-schools">
                                <a href="#endpoints-GETapi-v1-admin-schools">GET api/v1/admin/schools</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-admin-schools">
                                <a href="#endpoints-POSTapi-v1-admin-schools">POST api/v1/admin/schools</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-admin-schools--id-">
                                <a href="#endpoints-GETapi-v1-admin-schools--id-">GET api/v1/admin/schools/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-admin-schools--id-">
                                <a href="#endpoints-PUTapi-v1-admin-schools--id-">PUT api/v1/admin/schools/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-admin-schools--id-">
                                <a href="#endpoints-DELETEapi-v1-admin-schools--id-">DELETE api/v1/admin/schools/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-me">
                                <a href="#endpoints-GETapi-v1-me">Get current authenticated user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-logout">
                                <a href="#endpoints-POSTapi-v1-logout">Logout user and revoke token</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-governorates">
                                <a href="#endpoints-GETapi-v1-governorates">GET api/v1/governorates</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-governorates--id-">
                                <a href="#endpoints-GETapi-v1-governorates--id-">GET api/v1/governorates/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-health">
                                <a href="#endpoints-GETapi-health">GET api/health</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 29, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>
    <strong>Base URL</strong>: <code>http://45.245.146.33:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-v1-auth-login">Authenticate user and return access token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-auth-login">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/auth/login"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": "01010869000",
    "national_id": "01234567891234",
    "email": "tarek@digitopia.com",
    "password": "12345678"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/auth/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'phone' =&gt; '01010869000',
            'national_id' =&gt; '01234567891234',
            'email' =&gt; 'tarek@digitopia.com',
            'password' =&gt; '12345678',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/auth/login';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'phone' =&gt; '01010869000',
    'national_id' =&gt; '01234567891234',
    'email' =&gt; 'tarek@digitopia.com',
    'password' =&gt; '12345678',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/auth/login");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'phone' =&gt; '01010869000',
    'national_id' =&gt; '01234567891234',
    'email' =&gt; 'tarek@digitopia.com',
    'password' =&gt; '12345678',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-login">
</span>
<span id="execution-results-POSTapi-v1-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-login" data-method="POST"
      data-path="api/v1/auth/login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-login"
                    onclick="tryItOut('POSTapi-v1-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-login"
                    onclick="cancelTryOut('POSTapi-v1-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-auth-login"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-auth-login"
               value="01010869000"
               data-component="body">
    <br>
<p>Phone number of the user (11 digits). Required if national_id and email are not provided. This field is required when none of <code>national_id</code> and <code>email</code> are present. Must be 11 digits. Example: <code>01010869000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="POSTapi-v1-auth-login"
               value="01234567891234"
               data-component="body">
    <br>
<p>National ID of the user (14 digits). Required if phone and email are not provided. This field is required when none of <code>phone</code> and <code>email</code> are present. Must be 14 digits. Example: <code>01234567891234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-auth-login"
               value="tarek@digitopia.com"
               data-component="body">
    <br>
<p>Email address of the user. Required if phone and national_id are not provided. This field is required when none of <code>phone</code> and <code>national_id</code> are present. Must be a valid email address. Must not be greater than 255 characters. Example: <code>tarek@digitopia.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-auth-login"
               value="12345678"
               data-component="body">
    <br>
<p>Password of the user (minimum 8 characters). Must be at least 8 characters. Example: <code>12345678</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-student-available-exam">Student gets available exam if session exists
Student can only start exam during exam time window</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-student-available-exam">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/student/available-exam"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/student/available-exam';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/student/available-exam';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/student/available-exam");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-student-available-exam">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-student-available-exam" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-student-available-exam"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-student-available-exam"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-student-available-exam" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-student-available-exam">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-student-available-exam" data-method="GET"
      data-path="api/v1/student/available-exam"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-student-available-exam', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-student-available-exam"
                    onclick="tryItOut('GETapi-v1-student-available-exam');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-student-available-exam"
                    onclick="cancelTryOut('GETapi-v1-student-available-exam');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-student-available-exam"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/student/available-exam</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-student-available-exam"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-student-available-exam"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-student-available-exam"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-student-exam-submit">Submit complete exam with all answers at once</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-student-exam-submit">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/student/exam/submit"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "answers": [
        {
            "question_id": 1,
            "answer_text": "The capital of Egypt is Cairo.",
            "answer_image": "base64_encoded_image_string",
            "answer_data": {
                "choice": "A"
            },
            "time_spent_seconds": 45
        },
        {
            "question_id": 2,
            "answer_text": null,
            "answer_image": null,
            "answer_data": {
                "selected_options": [
                    1,
                    3
                ]
            },
            "time_spent_seconds": 30
        }
    ],
    "notes": "I had trouble with question 3 due to formatting."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/student/exam/submit';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'answers' =&gt; [
                [
                    'question_id' =&gt; 1,
                    'answer_text' =&gt; 'The capital of Egypt is Cairo.',
                    'answer_image' =&gt; 'base64_encoded_image_string',
                    'answer_data' =&gt; [
                        'choice' =&gt; 'A',
                    ],
                    'time_spent_seconds' =&gt; 45,
                ],
                [
                    'question_id' =&gt; 2,
                    'answer_text' =&gt; null,
                    'answer_image' =&gt; null,
                    'answer_data' =&gt; [
                        'selected_options' =&gt; [
                            1,
                            3,
                        ],
                    ],
                    'time_spent_seconds' =&gt; 30,
                ],
            ],
            'notes' =&gt; 'I had trouble with question 3 due to formatting.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/student/exam/submit';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'answers' =&gt; [
        [
            'question_id' =&gt; 1,
            'answer_text' =&gt; 'The capital of Egypt is Cairo.',
            'answer_image' =&gt; 'base64_encoded_image_string',
            'answer_data' =&gt; [
                'choice' =&gt; 'A',
            ],
            'time_spent_seconds' =&gt; 45,
        ],
        [
            'question_id' =&gt; 2,
            'answer_text' =&gt; null,
            'answer_image' =&gt; null,
            'answer_data' =&gt; [
                'selected_options' =&gt; [
                    1,
                    3,
                ],
            ],
            'time_spent_seconds' =&gt; 30,
        ],
    ],
    'notes' =&gt; 'I had trouble with question 3 due to formatting.',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/student/exam/submit");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'answers' =&gt; [
        [
            'question_id' =&gt; 1,
            'answer_text' =&gt; 'The capital of Egypt is Cairo.',
            'answer_image' =&gt; 'base64_encoded_image_string',
            'answer_data' =&gt; [
                'choice' =&gt; 'A',
            ],
            'time_spent_seconds' =&gt; 45,
        ],
        [
            'question_id' =&gt; 2,
            'answer_text' =&gt; null,
            'answer_image' =&gt; null,
            'answer_data' =&gt; [
                'selected_options' =&gt; [
                    1,
                    3,
                ],
            ],
            'time_spent_seconds' =&gt; 30,
        ],
    ],
    'notes' =&gt; 'I had trouble with question 3 due to formatting.',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-student-exam-submit">
</span>
<span id="execution-results-POSTapi-v1-student-exam-submit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-student-exam-submit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-student-exam-submit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-student-exam-submit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-student-exam-submit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-student-exam-submit" data-method="POST"
      data-path="api/v1/student/exam/submit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-student-exam-submit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-student-exam-submit"
                    onclick="tryItOut('POSTapi-v1-student-exam-submit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-student-exam-submit"
                    onclick="cancelTryOut('POSTapi-v1-student-exam-submit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-student-exam-submit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/student/exam/submit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-student-exam-submit"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>answers</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
 &nbsp;
<br>
<p>List of answers submitted by the student. Must have at least 1 items.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>question_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="answers.0.question_id"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="1"
               data-component="body">
    <br>
<p>The ID of the exam question being answered. The <code>id</code> of an existing record in the exam_questions table. Example: <code>1</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>answer_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="answers.0.answer_text"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="Cairo"
               data-component="body">
    <br>
<p>The textual answer provided by the student (if applicable). Example: <code>Cairo</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>answer_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="answers.0.answer_image"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="iVBORw0KGgoAAAANSUhEUgAA..."
               data-component="body">
    <br>
<p>Base64 encoded image string for image-based answers (optional). Example: <code>iVBORw0KGgoAAAANSUhEUgAA...</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>answer_data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="answers.0.answer_data"                data-endpoint="POSTapi-v1-student-exam-submit"
               value=""
               data-component="body">
    <br>
<p>Extra structured data for complex answers (e.g., multiple choices).</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>time_spent_seconds</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="answers.0.time_spent_seconds"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="42"
               data-component="body">
    <br>
<p>Number of seconds the student spent on this question (optional). Must be at least 0. Example: <code>42</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="POSTapi-v1-student-exam-submit"
               value="I had trouble with question 3 due to formatting."
               data-component="body">
    <br>
<p>Optional notes provided by the student about the exam. Must not be greater than 500 characters. Example: <code>I had trouble with question 3 due to formatting.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-student-exam-results">GET api/v1/student/exam/results</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-student-exam-results">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/student/exam/results"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/student/exam/results';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/student/exam/results';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/student/exam/results");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-student-exam-results">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-student-exam-results" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-student-exam-results"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-student-exam-results"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-student-exam-results" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-student-exam-results">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-student-exam-results" data-method="GET"
      data-path="api/v1/student/exam/results"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-student-exam-results', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-student-exam-results"
                    onclick="tryItOut('GETapi-v1-student-exam-results');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-student-exam-results"
                    onclick="cancelTryOut('GETapi-v1-student-exam-results');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-student-exam-results"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/student/exam/results</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-student-exam-results"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-student-exam-results"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-student-exam-results"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-teacher-scan-qr-create-session">Teacher scans QR code with student_id and creates session</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-teacher-scan-qr-create-session">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/teacher/scan-qr-create-session"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "student_id": 16,
    "battery_level": 22
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/teacher/scan-qr-create-session';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'student_id' =&gt; 16,
            'battery_level' =&gt; 22,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/teacher/scan-qr-create-session';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'student_id' =&gt; 16,
    'battery_level' =&gt; 22,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/teacher/scan-qr-create-session");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'student_id' =&gt; 16,
    'battery_level' =&gt; 22,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-teacher-scan-qr-create-session">
</span>
<span id="execution-results-POSTapi-v1-teacher-scan-qr-create-session" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-teacher-scan-qr-create-session"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-teacher-scan-qr-create-session"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-teacher-scan-qr-create-session" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-teacher-scan-qr-create-session">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-teacher-scan-qr-create-session" data-method="POST"
      data-path="api/v1/teacher/scan-qr-create-session"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-teacher-scan-qr-create-session', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-teacher-scan-qr-create-session"
                    onclick="tryItOut('POSTapi-v1-teacher-scan-qr-create-session');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-teacher-scan-qr-create-session"
                    onclick="cancelTryOut('POSTapi-v1-teacher-scan-qr-create-session');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-teacher-scan-qr-create-session"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/teacher/scan-qr-create-session</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>student_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="student_id"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the students table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>device_info</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="device_info"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>battery_level</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="battery_level"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 0. Must not be greater than 100. Example: <code>22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="POSTapi-v1-teacher-scan-qr-create-session"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-teacher-my-schools">GET api/v1/teacher/my-schools</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-teacher-my-schools">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/teacher/my-schools"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/teacher/my-schools';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/teacher/my-schools';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/teacher/my-schools");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-teacher-my-schools">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-teacher-my-schools" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-teacher-my-schools"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-teacher-my-schools"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-teacher-my-schools" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-teacher-my-schools">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-teacher-my-schools" data-method="GET"
      data-path="api/v1/teacher/my-schools"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-teacher-my-schools', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-teacher-my-schools"
                    onclick="tryItOut('GETapi-v1-teacher-my-schools');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-teacher-my-schools"
                    onclick="cancelTryOut('GETapi-v1-teacher-my-schools');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-teacher-my-schools"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/teacher/my-schools</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-teacher-my-schools"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-teacher-my-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-teacher-my-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-admin-students">List students with filters and pagination.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<ul>
<li>School Admin: only students in their school</li>
<li>Ministry Admin: all students</li>
</ul>

<span id="example-requests-GETapi-v1-admin-students">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/students"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/students';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/students';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/students");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-students">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-students" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-students"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-students"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-students" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-students">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-students" data-method="GET"
      data-path="api/v1/admin/students"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-students', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-students"
                    onclick="tryItOut('GETapi-v1-admin-students');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-students"
                    onclick="cancelTryOut('GETapi-v1-admin-students');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-students"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/students</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-students"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-students"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-students"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-students">Create student account (School Admin only)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-students">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/students"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tarek Hesham Sayed ElFarmawy",
    "email": "student@example.com",
    "phone": "01234567890",
    "national_id": "12345678901234",
    "password": "password123",
    "seat_number": "A23",
    "academic_year": "second",
    "section": "scientific",
    "birth_date": "2025-05-15",
    "gender": "male",
    "guardian_phone": "01098765432"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/students';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
            'email' =&gt; 'student@example.com',
            'phone' =&gt; '01234567890',
            'national_id' =&gt; '12345678901234',
            'password' =&gt; 'password123',
            'seat_number' =&gt; 'A23',
            'academic_year' =&gt; 'second',
            'section' =&gt; 'scientific',
            'birth_date' =&gt; '2025-05-15',
            'gender' =&gt; 'male',
            'guardian_phone' =&gt; '01098765432',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/students';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'student@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'seat_number' =&gt; 'A23',
    'academic_year' =&gt; 'second',
    'section' =&gt; 'scientific',
    'birth_date' =&gt; '2025-05-15',
    'gender' =&gt; 'male',
    'guardian_phone' =&gt; '01098765432',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/students");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'student@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'seat_number' =&gt; 'A23',
    'academic_year' =&gt; 'second',
    'section' =&gt; 'scientific',
    'birth_date' =&gt; '2025-05-15',
    'gender' =&gt; 'male',
    'guardian_phone' =&gt; '01098765432',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-students">
</span>
<span id="execution-results-POSTapi-v1-admin-students" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-students"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-students"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-students" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-students">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-students" data-method="POST"
      data-path="api/v1/admin/students"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-students', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-students"
                    onclick="tryItOut('POSTapi-v1-admin-students');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-students"
                    onclick="cancelTryOut('POSTapi-v1-admin-students');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-students"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/students</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-students"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-students"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-students"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-students"
               value="Tarek Hesham Sayed ElFarmawy"
               data-component="body">
    <br>
<p>Full name of the student. Must not be greater than 255 characters. Example: <code>Tarek Hesham Sayed ElFarmawy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-admin-students"
               value="student@example.com"
               data-component="body">
    <br>
<p>Email address of the student (must be unique). Must be a valid email address. Must not be greater than 255 characters. Example: <code>student@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-admin-students"
               value="01234567890"
               data-component="body">
    <br>
<p>Phone number of the student (must be unique). Must not be greater than 20 characters. Example: <code>01234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="POSTapi-v1-admin-students"
               value="12345678901234"
               data-component="body">
    <br>
<p>National ID of the student (14 digits, unique). Must be 14 digits. Example: <code>12345678901234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-admin-students"
               value="password123"
               data-component="body">
    <br>
<p>Password for the student account. Must be at least 8 characters. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>seat_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="seat_number"                data-endpoint="POSTapi-v1-admin-students"
               value="A23"
               data-component="body">
    <br>
<p>Seat number of the student (optional). Must not be greater than 20 characters. Example: <code>A23</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>academic_year</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="academic_year"                data-endpoint="POSTapi-v1-admin-students"
               value="second"
               data-component="body">
    <br>
<p>Academic year of the student. Example: <code>second</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>first</code></li> <li><code>second</code></li> <li><code>third</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="section"                data-endpoint="POSTapi-v1-admin-students"
               value="scientific"
               data-component="body">
    <br>
<p>Student section (scientific or literature). Example: <code>scientific</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>scientific</code></li> <li><code>literature</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="POSTapi-v1-admin-students"
               value="2025-05-15"
               data-component="body">
    <br>
<p>Date of birth of the student. Must be a valid date. Must be a date before <code>today</code>. Example: <code>2025-05-15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-v1-admin-students"
               value="male"
               data-component="body">
    <br>
<p>Gender of the student. Example: <code>male</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guardian_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guardian_phone"                data-endpoint="POSTapi-v1-admin-students"
               value="01098765432"
               data-component="body">
    <br>
<p>Phone number of the guardian. Must not be greater than 20 characters. Example: <code>01098765432</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-students--id-">Show a student&#039;s details.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-students--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/students/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/students/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-students--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-students--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-students--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-students--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-students--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-students--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-students--id-" data-method="GET"
      data-path="api/v1/admin/students/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-students--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-students--id-"
                    onclick="tryItOut('GETapi-v1-admin-students--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-students--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-students--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-students--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/students/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-students--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-students--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the student. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-students--id-">Update student (School Admin only)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-students--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/students/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tarek Hesham Sayed ElFarmawy",
    "email": "tarek@example.com",
    "phone": "+201234567890",
    "national_id": "29801012345678",
    "password": "Secret1234",
    "seat_number": "2025-001",
    "academic_year": "first",
    "section": "scientific",
    "birth_date": "2005-05-20",
    "gender": "male",
    "guardian_phone": "01112223334",
    "is_banned": false,
    "ban_until": "2025-12-31",
    "ban_reason": "Misconduct in exam."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
            'email' =&gt; 'tarek@example.com',
            'phone' =&gt; '+201234567890',
            'national_id' =&gt; '29801012345678',
            'password' =&gt; 'Secret1234',
            'seat_number' =&gt; '2025-001',
            'academic_year' =&gt; 'first',
            'section' =&gt; 'scientific',
            'birth_date' =&gt; '2005-05-20',
            'gender' =&gt; 'male',
            'guardian_phone' =&gt; '01112223334',
            'is_banned' =&gt; false,
            'ban_until' =&gt; '2025-12-31',
            'ban_reason' =&gt; 'Misconduct in exam.',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'tarek@example.com',
    'phone' =&gt; '+201234567890',
    'national_id' =&gt; '29801012345678',
    'password' =&gt; 'Secret1234',
    'seat_number' =&gt; '2025-001',
    'academic_year' =&gt; 'first',
    'section' =&gt; 'scientific',
    'birth_date' =&gt; '2005-05-20',
    'gender' =&gt; 'male',
    'guardian_phone' =&gt; '01112223334',
    'is_banned' =&gt; false,
    'ban_until' =&gt; '2025-12-31',
    'ban_reason' =&gt; 'Misconduct in exam.',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/students/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'tarek@example.com',
    'phone' =&gt; '+201234567890',
    'national_id' =&gt; '29801012345678',
    'password' =&gt; 'Secret1234',
    'seat_number' =&gt; '2025-001',
    'academic_year' =&gt; 'first',
    'section' =&gt; 'scientific',
    'birth_date' =&gt; '2005-05-20',
    'gender' =&gt; 'male',
    'guardian_phone' =&gt; '01112223334',
    'is_banned' =&gt; false,
    'ban_until' =&gt; '2025-12-31',
    'ban_reason' =&gt; 'Misconduct in exam.',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-students--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-students--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-students--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-students--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-students--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-students--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-students--id-" data-method="PUT"
      data-path="api/v1/admin/students/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-students--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-students--id-"
                    onclick="tryItOut('PUTapi-v1-admin-students--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-students--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-students--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-students--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/students/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/students/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-students--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the student. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="Tarek Hesham Sayed ElFarmawy"
               data-component="body">
    <br>
<p>Full name of the student. Must not be greater than 255 characters. Example: <code>Tarek Hesham Sayed ElFarmawy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="tarek@example.com"
               data-component="body">
    <br>
<p>Unique email address of the student. Must be a valid email address. Must not be greater than 255 characters. Example: <code>tarek@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="+201234567890"
               data-component="body">
    <br>
<p>Unique phone number of the student. Must not be greater than 20 characters. Example: <code>+201234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="29801012345678"
               data-component="body">
    <br>
<p>National ID (14 digits). Must be 14 digits. Example: <code>29801012345678</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="Secret1234"
               data-component="body">
    <br>
<p>Password (if updating). Must be confirmed with <code>password_confirmation</code>. Must be at least 8 characters. Example: <code>Secret1234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>seat_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="seat_number"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="2025-001"
               data-component="body">
    <br>
<p>Seat number assigned to the student (optional). Must not be greater than 20 characters. Example: <code>2025-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>academic_year</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="academic_year"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="first"
               data-component="body">
    <br>
<p>Academic year of the student. Example: <code>first</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>first</code></li> <li><code>second</code></li> <li><code>third</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="section"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="scientific"
               data-component="body">
    <br>
<p>Section of the student. Example: <code>scientific</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>scientific</code></li> <li><code>literature</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="2005-05-20"
               data-component="body">
    <br>
<p>Birth date of the student. Must be a valid date. Must be a date before <code>today</code>. Example: <code>2005-05-20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="male"
               data-component="body">
    <br>
<p>Gender of the student. Example: <code>male</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>guardian_phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="guardian_phone"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="01112223334"
               data-component="body">
    <br>
<p>Phone number of the guardian. Must not be greater than 20 characters. Example: <code>01112223334</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_banned</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-students--id-" style="display: none">
            <input type="radio" name="is_banned"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-students--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-students--id-" style="display: none">
            <input type="radio" name="is_banned"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-students--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the student is banned from the system. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ban_until</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ban_until"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="2025-12-31"
               data-component="body">
    <br>
<p>Date until which the student is banned (optional). Must be a valid date. Must be a date after <code>now</code>. Example: <code>2025-12-31</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ban_reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ban_reason"                data-endpoint="PUTapi-v1-admin-students--id-"
               value="Misconduct in exam."
               data-component="body">
    <br>
<p>Reason for banning the student (optional). Must not be greater than 1000 characters. Example: <code>Misconduct in exam.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-students--id-">Remove a student (soft-delete) and associated user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-students--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/students/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/students/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/students/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-students--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-students--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-students--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-students--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-students--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-students--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-students--id-" data-method="DELETE"
      data-path="api/v1/admin/students/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-students--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-students--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-students--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-students--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-students--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-students--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/students/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-students--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-students--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-students--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the student. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-teachers">List all teachers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-teachers">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-teachers">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-teachers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-teachers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-teachers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-teachers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-teachers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-teachers" data-method="GET"
      data-path="api/v1/admin/teachers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-teachers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-teachers"
                    onclick="tryItOut('GETapi-v1-admin-teachers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-teachers"
                    onclick="cancelTryOut('GETapi-v1-admin-teachers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-teachers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/teachers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-teachers"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-teachers">Create teacher account (Ministry Admin only)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-teachers">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tarek Hesham Sayed ElFarmawy",
    "email": "teacher@example.com",
    "phone": "01234567890",
    "national_id": "12345678901234",
    "password": "password123",
    "subject_id": 5,
    "teacher_type": "regular",
    "can_create_exams": false,
    "can_correct_essays": false,
    "is_active": false,
    "assignment_type": "teaching"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
            'email' =&gt; 'teacher@example.com',
            'phone' =&gt; '01234567890',
            'national_id' =&gt; '12345678901234',
            'password' =&gt; 'password123',
            'subject_id' =&gt; 5,
            'teacher_type' =&gt; 'regular',
            'can_create_exams' =&gt; false,
            'can_correct_essays' =&gt; false,
            'is_active' =&gt; false,
            'assignment_type' =&gt; 'teaching',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'teacher@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'subject_id' =&gt; 5,
    'teacher_type' =&gt; 'regular',
    'can_create_exams' =&gt; false,
    'can_correct_essays' =&gt; false,
    'is_active' =&gt; false,
    'assignment_type' =&gt; 'teaching',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'teacher@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'subject_id' =&gt; 5,
    'teacher_type' =&gt; 'regular',
    'can_create_exams' =&gt; false,
    'can_correct_essays' =&gt; false,
    'is_active' =&gt; false,
    'assignment_type' =&gt; 'teaching',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-teachers">
</span>
<span id="execution-results-POSTapi-v1-admin-teachers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-teachers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-teachers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-teachers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-teachers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-teachers" data-method="POST"
      data-path="api/v1/admin/teachers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-teachers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-teachers"
                    onclick="tryItOut('POSTapi-v1-admin-teachers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-teachers"
                    onclick="cancelTryOut('POSTapi-v1-admin-teachers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-teachers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/teachers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-teachers"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-teachers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-teachers"
               value="Tarek Hesham Sayed ElFarmawy"
               data-component="body">
    <br>
<p>Full name of the teacher. Must not be greater than 255 characters. Example: <code>Tarek Hesham Sayed ElFarmawy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-admin-teachers"
               value="teacher@example.com"
               data-component="body">
    <br>
<p>Email address of the teacher (must be unique). Must be a valid email address. Must not be greater than 100 characters. Example: <code>teacher@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-admin-teachers"
               value="01234567890"
               data-component="body">
    <br>
<p>Phone number of the teacher (must be unique). Must not be greater than 20 characters. Example: <code>01234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="POSTapi-v1-admin-teachers"
               value="12345678901234"
               data-component="body">
    <br>
<p>National ID of the teacher (14 digits, unique). Must be 14 digits. Example: <code>12345678901234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-admin-teachers"
               value="password123"
               data-component="body">
    <br>
<p>Password for the teacher account. Must be at least 8 characters. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subject_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="subject_id"                data-endpoint="POSTapi-v1-admin-teachers"
               value="5"
               data-component="body">
    <br>
<p>Subject ID or name assigned to the teacher. Must not be greater than 255 characters. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>teacher_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="teacher_type"                data-endpoint="POSTapi-v1-admin-teachers"
               value="regular"
               data-component="body">
    <br>
<p>Type of teacher (regular or supervisor). Example: <code>regular</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>regular</code></li> <li><code>supervisor</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>can_create_exams</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="can_create_exams"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="can_create_exams"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the teacher can create exams. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>can_correct_essays</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="can_correct_essays"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="can_correct_essays"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the teacher can correct essays. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-teachers" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-teachers"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the teacher account is active. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="school_ids[0]"                data-endpoint="POSTapi-v1-admin-teachers"
               data-component="body">
        <input type="text" style="display: none"
               name="school_ids[1]"                data-endpoint="POSTapi-v1-admin-teachers"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the schools table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assignment_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assignment_type"                data-endpoint="POSTapi-v1-admin-teachers"
               value="teaching"
               data-component="body">
    <br>
<p>Type of assignment for the teacher (teaching, supervision, correction). Example: <code>teaching</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>teaching</code></li> <li><code>supervision</code></li> <li><code>correction</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-teachers--id-">Show teacher details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-teachers--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-teachers--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-teachers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-teachers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-teachers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-teachers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-teachers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-teachers--id-" data-method="GET"
      data-path="api/v1/admin/teachers/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-teachers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-teachers--id-"
                    onclick="tryItOut('GETapi-v1-admin-teachers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-teachers--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-teachers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-teachers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/teachers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-teachers--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-teachers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-teachers--id-">Update teacher information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-teachers--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "teacher@example.com",
    "phone": "01234567890",
    "national_id": "12345678901234",
    "password": "password123",
    "subject_id": "MATH101",
    "teacher_type": "regular",
    "can_create_exams": false,
    "can_correct_essays": false,
    "is_active": false,
    "school_ids": [
        1
    ],
    "assignment_type": "teaching"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'John Doe',
            'email' =&gt; 'teacher@example.com',
            'phone' =&gt; '01234567890',
            'national_id' =&gt; '12345678901234',
            'password' =&gt; 'password123',
            'subject_id' =&gt; 'MATH101',
            'teacher_type' =&gt; 'regular',
            'can_create_exams' =&gt; false,
            'can_correct_essays' =&gt; false,
            'is_active' =&gt; false,
            'school_ids' =&gt; [
                1,
            ],
            'assignment_type' =&gt; 'teaching',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'John Doe',
    'email' =&gt; 'teacher@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'subject_id' =&gt; 'MATH101',
    'teacher_type' =&gt; 'regular',
    'can_create_exams' =&gt; false,
    'can_correct_essays' =&gt; false,
    'is_active' =&gt; false,
    'school_ids' =&gt; [
        1,
    ],
    'assignment_type' =&gt; 'teaching',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'John Doe',
    'email' =&gt; 'teacher@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'subject_id' =&gt; 'MATH101',
    'teacher_type' =&gt; 'regular',
    'can_create_exams' =&gt; false,
    'can_correct_essays' =&gt; false,
    'is_active' =&gt; false,
    'school_ids' =&gt; [
        1,
    ],
    'assignment_type' =&gt; 'teaching',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-teachers--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-teachers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-teachers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-teachers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-teachers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-teachers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-teachers--id-" data-method="PUT"
      data-path="api/v1/admin/teachers/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-teachers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-teachers--id-"
                    onclick="tryItOut('PUTapi-v1-admin-teachers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-teachers--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-teachers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-teachers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/teachers/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/teachers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="John Doe"
               data-component="body">
    <br>
<p>Full name of the teacher. Must not be greater than 255 characters. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="teacher@example.com"
               data-component="body">
    <br>
<p>Email address of the teacher (must be unique). Must be a valid email address. Must not be greater than 255 characters. Example: <code>teacher@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="01234567890"
               data-component="body">
    <br>
<p>Phone number of the teacher (must be unique). Must not be greater than 20 characters. Example: <code>01234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="12345678901234"
               data-component="body">
    <br>
<p>National ID of the teacher (14 digits, unique). Must be 14 digits. Example: <code>12345678901234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="password123"
               data-component="body">
    <br>
<p>Password for the teacher account (minimum 8 characters). Must be at least 8 characters. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subject_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="subject_id"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="MATH101"
               data-component="body">
    <br>
<p>ID or code of the subject assigned to the teacher. Must not be greater than 255 characters. Example: <code>MATH101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>teacher_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="teacher_type"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="regular"
               data-component="body">
    <br>
<p>Type of teacher. Example: <code>regular</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>regular</code></li> <li><code>supervisor</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>can_create_exams</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="can_create_exams"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="can_create_exams"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the teacher can create exams. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>can_correct_essays</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="can_correct_essays"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="can_correct_essays"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the teacher can correct essay questions. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-teachers--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-teachers--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the teacher account is active. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="school_ids[0]"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="school_ids[1]"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               data-component="body">
    <br>
<p>Individual school ID assigned to the teacher. The <code>id</code> of an existing record in the schools table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assignment_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assignment_type"                data-endpoint="PUTapi-v1-admin-teachers--id-"
               value="teaching"
               data-component="body">
    <br>
<p>Type of assignment for the teacher in schools. Example: <code>teaching</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>teaching</code></li> <li><code>supervision</code></li> <li><code>correction</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-teachers--id-">Delete teacher</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-teachers--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-teachers--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-teachers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-teachers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-teachers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-teachers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-teachers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-teachers--id-" data-method="DELETE"
      data-path="api/v1/admin/teachers/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-teachers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-teachers--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-teachers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-teachers--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-teachers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-teachers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/teachers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-teachers--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-teachers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-teachers--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-admin-teachers--teacherId--assign-schools">POST api/v1/admin/teachers/{teacherId}/assign-schools</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-teachers--teacherId--assign-schools">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers/architecto/assign-schools"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "school_ids": [
        1
    ],
    "assignment_type": "supervision"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto/assign-schools';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'school_ids' =&gt; [
                1,
            ],
            'assignment_type' =&gt; 'supervision',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers/architecto/assign-schools';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'school_ids' =&gt; [
        1,
    ],
    'assignment_type' =&gt; 'supervision',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers/architecto/assign-schools");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'school_ids' =&gt; [
        1,
    ],
    'assignment_type' =&gt; 'supervision',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-teachers--teacherId--assign-schools">
</span>
<span id="execution-results-POSTapi-v1-admin-teachers--teacherId--assign-schools" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-teachers--teacherId--assign-schools"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-teachers--teacherId--assign-schools"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-teachers--teacherId--assign-schools" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-teachers--teacherId--assign-schools">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-teachers--teacherId--assign-schools" data-method="POST"
      data-path="api/v1/admin/teachers/{teacherId}/assign-schools"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-teachers--teacherId--assign-schools', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-teachers--teacherId--assign-schools"
                    onclick="tryItOut('POSTapi-v1-admin-teachers--teacherId--assign-schools');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-teachers--teacherId--assign-schools"
                    onclick="cancelTryOut('POSTapi-v1-admin-teachers--teacherId--assign-schools');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-teachers--teacherId--assign-schools"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/teachers/{teacherId}/assign-schools</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>teacherId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="teacherId"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_ids</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="school_ids[0]"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               data-component="body">
        <input type="text" style="display: none"
               name="school_ids[1]"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               data-component="body">
    <br>
<p>Individual school ID where the teacher will be assigned. The <code>id</code> of an existing record in the schools table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assignment_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assignment_type"                data-endpoint="POSTapi-v1-admin-teachers--teacherId--assign-schools"
               value="supervision"
               data-component="body">
    <br>
<p>Type of assignment for the teacher across the selected schools. Defaults to &quot;teaching&quot; if not provided. Example: <code>supervision</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>teaching</code></li> <li><code>supervision</code></li> <li><code>correction</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-teachers-by-school--schoolId-">Get teachers by school</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-teachers-by-school--schoolId-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teachers/by-school/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teachers/by-school/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teachers/by-school/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teachers/by-school/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-teachers-by-school--schoolId-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-teachers-by-school--schoolId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-teachers-by-school--schoolId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-teachers-by-school--schoolId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-teachers-by-school--schoolId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-teachers-by-school--schoolId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-teachers-by-school--schoolId-" data-method="GET"
      data-path="api/v1/admin/teachers/by-school/{schoolId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-teachers-by-school--schoolId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-teachers-by-school--schoolId-"
                    onclick="tryItOut('GETapi-v1-admin-teachers-by-school--schoolId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-teachers-by-school--schoolId-"
                    onclick="cancelTryOut('GETapi-v1-admin-teachers-by-school--schoolId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-teachers-by-school--schoolId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/teachers/by-school/{schoolId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-teachers-by-school--schoolId-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-teachers-by-school--schoolId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-teachers-by-school--schoolId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>schoolId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="schoolId"                data-endpoint="GETapi-v1-admin-teachers-by-school--schoolId-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-teacher-school-assignments">GET api/v1/admin/teacher-school-assignments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-teacher-school-assignments">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-teacher-school-assignments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-teacher-school-assignments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-teacher-school-assignments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-teacher-school-assignments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-teacher-school-assignments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-teacher-school-assignments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-teacher-school-assignments" data-method="GET"
      data-path="api/v1/admin/teacher-school-assignments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-teacher-school-assignments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-teacher-school-assignments"
                    onclick="tryItOut('GETapi-v1-admin-teacher-school-assignments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-teacher-school-assignments"
                    onclick="cancelTryOut('GETapi-v1-admin-teacher-school-assignments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-teacher-school-assignments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/teacher-school-assignments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-teacher-school-assignments"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-teacher-school-assignments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-teacher-school-assignments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-teacher-school-assignments">POST api/v1/admin/teacher-school-assignments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-teacher-school-assignments">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "teacher_id": 5,
    "school_id": 12,
    "assignment_type": "teaching",
    "is_active": false,
    "assigned_at": "2025-09-29"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'teacher_id' =&gt; 5,
            'school_id' =&gt; 12,
            'assignment_type' =&gt; 'teaching',
            'is_active' =&gt; false,
            'assigned_at' =&gt; '2025-09-29',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'teacher_id' =&gt; 5,
    'school_id' =&gt; 12,
    'assignment_type' =&gt; 'teaching',
    'is_active' =&gt; false,
    'assigned_at' =&gt; '2025-09-29',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'teacher_id' =&gt; 5,
    'school_id' =&gt; 12,
    'assignment_type' =&gt; 'teaching',
    'is_active' =&gt; false,
    'assigned_at' =&gt; '2025-09-29',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-teacher-school-assignments">
</span>
<span id="execution-results-POSTapi-v1-admin-teacher-school-assignments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-teacher-school-assignments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-teacher-school-assignments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-teacher-school-assignments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-teacher-school-assignments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-teacher-school-assignments" data-method="POST"
      data-path="api/v1/admin/teacher-school-assignments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-teacher-school-assignments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-teacher-school-assignments"
                    onclick="tryItOut('POSTapi-v1-admin-teacher-school-assignments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-teacher-school-assignments"
                    onclick="cancelTryOut('POSTapi-v1-admin-teacher-school-assignments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-teacher-school-assignments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/teacher-school-assignments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>teacher_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="teacher_id"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="5"
               data-component="body">
    <br>
<p>ID of the teacher to assign. The <code>id</code> of an existing record in the teachers table. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="school_id"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="12"
               data-component="body">
    <br>
<p>ID of the school to assign the teacher to. The <code>id</code> of an existing record in the schools table. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assignment_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="assignment_type"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="teaching"
               data-component="body">
    <br>
<p>Type of assignment for the teacher in this school. Example: <code>teaching</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>teaching</code></li> <li><code>supervision</code></li> <li><code>correction</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-teacher-school-assignments" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-teacher-school-assignments" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if this assignment is currently active. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assigned_at"                data-endpoint="POSTapi-v1-admin-teacher-school-assignments"
               value="2025-09-29"
               data-component="body">
    <br>
<p>Date when the teacher was assigned to the school (optional). Must be a valid date. Example: <code>2025-09-29</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-teacher-school-assignments--id-">GET api/v1/admin/teacher-school-assignments/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-teacher-school-assignments--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-teacher-school-assignments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-teacher-school-assignments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-teacher-school-assignments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-teacher-school-assignments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-teacher-school-assignments--id-" data-method="GET"
      data-path="api/v1/admin/teacher-school-assignments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-teacher-school-assignments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-teacher-school-assignments--id-"
                    onclick="tryItOut('GETapi-v1-admin-teacher-school-assignments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-teacher-school-assignments--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-teacher-school-assignments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-teacher-school-assignments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/teacher-school-assignments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-teacher-school-assignments--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-teacher-school-assignments--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher school assignment. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-teacher-school-assignments--id-">PUT api/v1/admin/teacher-school-assignments/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-teacher-school-assignments--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "assignment_type": "supervision",
    "is_active": false,
    "assigned_at": "2025-10-01"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'assignment_type' =&gt; 'supervision',
            'is_active' =&gt; false,
            'assigned_at' =&gt; '2025-10-01',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'assignment_type' =&gt; 'supervision',
    'is_active' =&gt; false,
    'assigned_at' =&gt; '2025-10-01',
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'assignment_type' =&gt; 'supervision',
    'is_active' =&gt; false,
    'assigned_at' =&gt; '2025-10-01',
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-teacher-school-assignments--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-teacher-school-assignments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-teacher-school-assignments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-teacher-school-assignments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-teacher-school-assignments--id-" data-method="PUT"
      data-path="api/v1/admin/teacher-school-assignments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-teacher-school-assignments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-teacher-school-assignments--id-"
                    onclick="tryItOut('PUTapi-v1-admin-teacher-school-assignments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-teacher-school-assignments--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-teacher-school-assignments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-teacher-school-assignments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/teacher-school-assignments/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/teacher-school-assignments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher school assignment. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assignment_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assignment_type"                data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="supervision"
               data-component="body">
    <br>
<p>Updated type of assignment for the teacher. Example: <code>supervision</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>teaching</code></li> <li><code>supervision</code></li> <li><code>correction</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the assignment is active or not. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_at</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="assigned_at"                data-endpoint="PUTapi-v1-admin-teacher-school-assignments--id-"
               value="2025-10-01"
               data-component="body">
    <br>
<p>Date when the teacher was (re)assigned (optional). Must be a valid date. Example: <code>2025-10-01</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-teacher-school-assignments--id-">DELETE api/v1/admin/teacher-school-assignments/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-teacher-school-assignments--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/teacher-school-assignments/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-teacher-school-assignments--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-teacher-school-assignments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-teacher-school-assignments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-teacher-school-assignments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-teacher-school-assignments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-teacher-school-assignments--id-" data-method="DELETE"
      data-path="api/v1/admin/teacher-school-assignments/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-teacher-school-assignments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-teacher-school-assignments--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-teacher-school-assignments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-teacher-school-assignments--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-teacher-school-assignments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-teacher-school-assignments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/teacher-school-assignments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-teacher-school-assignments--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-teacher-school-assignments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-teacher-school-assignments--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the teacher school assignment. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-exams">GET api/v1/admin/exams</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exams">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exams">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exams" data-method="GET"
      data-path="api/v1/admin/exams"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exams"
                    onclick="tryItOut('GETapi-v1-admin-exams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exams"
                    onclick="cancelTryOut('GETapi-v1-admin-exams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exams"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-exams">POST api/v1/admin/exams</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-exams">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subject_id": 3,
    "title": "Midterm Exam",
    "description": "Covers chapters 1 to 3.",
    "exam_type": "final",
    "academic_year": "second",
    "start_time": "2025-10-01 09:00:00",
    "end_time": "2025-10-01 11:00:00",
    "duration_minutes": 120,
    "total_score": 100,
    "minimum_battery_percentage": 30,
    "require_video_recording": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'subject_id' =&gt; 3,
            'title' =&gt; 'Midterm Exam',
            'description' =&gt; 'Covers chapters 1 to 3.',
            'exam_type' =&gt; 'final',
            'academic_year' =&gt; 'second',
            'start_time' =&gt; '2025-10-01 09:00:00',
            'end_time' =&gt; '2025-10-01 11:00:00',
            'duration_minutes' =&gt; 120,
            'total_score' =&gt; 100,
            'minimum_battery_percentage' =&gt; 30,
            'require_video_recording' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'subject_id' =&gt; 3,
    'title' =&gt; 'Midterm Exam',
    'description' =&gt; 'Covers chapters 1 to 3.',
    'exam_type' =&gt; 'final',
    'academic_year' =&gt; 'second',
    'start_time' =&gt; '2025-10-01 09:00:00',
    'end_time' =&gt; '2025-10-01 11:00:00',
    'duration_minutes' =&gt; 120,
    'total_score' =&gt; 100,
    'minimum_battery_percentage' =&gt; 30,
    'require_video_recording' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'subject_id' =&gt; 3,
    'title' =&gt; 'Midterm Exam',
    'description' =&gt; 'Covers chapters 1 to 3.',
    'exam_type' =&gt; 'final',
    'academic_year' =&gt; 'second',
    'start_time' =&gt; '2025-10-01 09:00:00',
    'end_time' =&gt; '2025-10-01 11:00:00',
    'duration_minutes' =&gt; 120,
    'total_score' =&gt; 100,
    'minimum_battery_percentage' =&gt; 30,
    'require_video_recording' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-exams">
</span>
<span id="execution-results-POSTapi-v1-admin-exams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-exams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-exams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-exams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-exams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-exams" data-method="POST"
      data-path="api/v1/admin/exams"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-exams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-exams"
                    onclick="tryItOut('POSTapi-v1-admin-exams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-exams"
                    onclick="cancelTryOut('POSTapi-v1-admin-exams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-exams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/exams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-exams"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-exams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-exams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subject_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="subject_id"                data-endpoint="POSTapi-v1-admin-exams"
               value="3"
               data-component="body">
    <br>
<p>ID of the subject related to the exam. The <code>id</code> of an existing record in the subjects table. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-v1-admin-exams"
               value="Midterm Exam"
               data-component="body">
    <br>
<p>Title of the exam. Must not be greater than 255 characters. Example: <code>Midterm Exam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-admin-exams"
               value="Covers chapters 1 to 3."
               data-component="body">
    <br>
<p>Short description of the exam (optional). Must not be greater than 1000 characters. Example: <code>Covers chapters 1 to 3.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>exam_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="exam_type"                data-endpoint="POSTapi-v1-admin-exams"
               value="final"
               data-component="body">
    <br>
<p>Type of the exam (practice or final). Example: <code>final</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>practice</code></li> <li><code>final</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>academic_year</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="academic_year"                data-endpoint="POSTapi-v1-admin-exams"
               value="second"
               data-component="body">
    <br>
<p>Target academic year (first, second, third). Example: <code>second</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>first</code></li> <li><code>second</code></li> <li><code>third</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="POSTapi-v1-admin-exams"
               value="2025-10-01 09:00:00"
               data-component="body">
    <br>
<p>Start date and time of the exam (must be in the future). Must be a valid date. Must be a date after <code>now</code>. Example: <code>2025-10-01 09:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="POSTapi-v1-admin-exams"
               value="2025-10-01 11:00:00"
               data-component="body">
    <br>
<p>End date and time of the exam (must be after start_time). Must be a valid date. Must be a date after <code>start_time</code>. Example: <code>2025-10-01 11:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_minutes</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration_minutes"                data-endpoint="POSTapi-v1-admin-exams"
               value="120"
               data-component="body">
    <br>
<p>Duration of the exam in minutes (1 to 480). Must be at least 1. Must not be greater than 480. Example: <code>120</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_score</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_score"                data-endpoint="POSTapi-v1-admin-exams"
               value="100"
               data-component="body">
    <br>
<p>Total score of the exam. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minimum_battery_percentage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="minimum_battery_percentage"                data-endpoint="POSTapi-v1-admin-exams"
               value="30"
               data-component="body">
    <br>
<p>Minimum allowed battery percentage to enter the exam (0 to 100). Must be at least 0. Must not be greater than 100. Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>require_video_recording</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-exams" style="display: none">
            <input type="radio" name="require_video_recording"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-exams"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-exams" style="display: none">
            <input type="radio" name="require_video_recording"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-exams"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether video recording is required during the exam (true/false). Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-exams--id-">GET api/v1/admin/exams/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exams--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exams--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exams--id-" data-method="GET"
      data-path="api/v1/admin/exams/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exams--id-"
                    onclick="tryItOut('GETapi-v1-admin-exams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exams--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-exams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exams--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-exams--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-exams--exam_id-">PUT api/v1/admin/exams/{exam_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-exams--exam_id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/1"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Final Exam - Mathematics",
    "description": "Covers chapters 1 to 5.",
    "start_time": "2025-10-01 09:00:00",
    "end_time": "2025-10-01 11:00:00",
    "duration_minutes": 120,
    "total_score": 100,
    "minimum_battery_percentage": 30,
    "require_video_recording": false,
    "is_published": false,
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'title' =&gt; 'Final Exam - Mathematics',
            'description' =&gt; 'Covers chapters 1 to 5.',
            'start_time' =&gt; '2025-10-01 09:00:00',
            'end_time' =&gt; '2025-10-01 11:00:00',
            'duration_minutes' =&gt; 120,
            'total_score' =&gt; 100,
            'minimum_battery_percentage' =&gt; 30,
            'require_video_recording' =&gt; false,
            'is_published' =&gt; false,
            'is_active' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/1';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'title' =&gt; 'Final Exam - Mathematics',
    'description' =&gt; 'Covers chapters 1 to 5.',
    'start_time' =&gt; '2025-10-01 09:00:00',
    'end_time' =&gt; '2025-10-01 11:00:00',
    'duration_minutes' =&gt; 120,
    'total_score' =&gt; 100,
    'minimum_battery_percentage' =&gt; 30,
    'require_video_recording' =&gt; false,
    'is_published' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/1");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'title' =&gt; 'Final Exam - Mathematics',
    'description' =&gt; 'Covers chapters 1 to 5.',
    'start_time' =&gt; '2025-10-01 09:00:00',
    'end_time' =&gt; '2025-10-01 11:00:00',
    'duration_minutes' =&gt; 120,
    'total_score' =&gt; 100,
    'minimum_battery_percentage' =&gt; 30,
    'require_video_recording' =&gt; false,
    'is_published' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-exams--exam_id-">
</span>
<span id="execution-results-PUTapi-v1-admin-exams--exam_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-exams--exam_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-exams--exam_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-exams--exam_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-exams--exam_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-exams--exam_id-" data-method="PUT"
      data-path="api/v1/admin/exams/{exam_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-exams--exam_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-exams--exam_id-"
                    onclick="tryItOut('PUTapi-v1-admin-exams--exam_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-exams--exam_id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-exams--exam_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-exams--exam_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/exams/{exam_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>exam_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="exam_id"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="Final Exam - Mathematics"
               data-component="body">
    <br>
<p>Title of the exam. Must not be greater than 255 characters. Example: <code>Final Exam - Mathematics</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="Covers chapters 1 to 5."
               data-component="body">
    <br>
<p>Short description of the exam. Must not be greater than 1000 characters. Example: <code>Covers chapters 1 to 5.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="2025-10-01 09:00:00"
               data-component="body">
    <br>
<p>Start date and time of the exam (must be in the future if exam not started). Must be a valid date. Must be a date after <code>now</code>. Example: <code>2025-10-01 09:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="2025-10-01 11:00:00"
               data-component="body">
    <br>
<p>End date and time of the exam (must be after start_time). Must be a valid date. Must be a date after <code>start_time</code>. Example: <code>2025-10-01 11:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_minutes</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration_minutes"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="120"
               data-component="body">
    <br>
<p>Duration of the exam in minutes. Must be at least 1. Must not be greater than 480. Example: <code>120</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_score</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_score"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="100"
               data-component="body">
    <br>
<p>Total score of the exam. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minimum_battery_percentage</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="minimum_battery_percentage"                data-endpoint="PUTapi-v1-admin-exams--exam_id-"
               value="30"
               data-component="body">
    <br>
<p>Minimum allowed battery percentage to enter the exam. Must be at least 0. Must not be greater than 100. Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>require_video_recording</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="require_video_recording"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="require_video_recording"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether video recording is required during the exam. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_published</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="is_published"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="is_published"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the exam is published. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-exams--exam_id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-exams--exam_id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the exam is active. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-exams--id-">DELETE api/v1/admin/exams/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-exams--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-exams--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-exams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-exams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-exams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-exams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-exams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-exams--id-" data-method="DELETE"
      data-path="api/v1/admin/exams/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-exams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-exams--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-exams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-exams--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-exams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-exams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/exams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-exams--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-exams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-exams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-exams--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-admin-exams--id--duplicate">POST api/v1/admin/exams/{id}/duplicate</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-exams--id--duplicate">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/architecto/duplicate"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/duplicate';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/duplicate';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/architecto/duplicate");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-exams--id--duplicate">
</span>
<span id="execution-results-POSTapi-v1-admin-exams--id--duplicate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-exams--id--duplicate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-exams--id--duplicate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-exams--id--duplicate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-exams--id--duplicate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-exams--id--duplicate" data-method="POST"
      data-path="api/v1/admin/exams/{id}/duplicate"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-exams--id--duplicate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-exams--id--duplicate"
                    onclick="tryItOut('POSTapi-v1-admin-exams--id--duplicate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-exams--id--duplicate"
                    onclick="cancelTryOut('POSTapi-v1-admin-exams--id--duplicate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-exams--id--duplicate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/exams/{id}/duplicate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-exams--id--duplicate"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-exams--id--duplicate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-exams--id--duplicate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-v1-admin-exams--id--duplicate"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-exams--id--statistics">GET api/v1/admin/exams/{id}/statistics</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exams--id--statistics">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/architecto/statistics"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/statistics';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/statistics';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/architecto/statistics");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exams--id--statistics">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exams--id--statistics" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exams--id--statistics"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exams--id--statistics"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exams--id--statistics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exams--id--statistics">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exams--id--statistics" data-method="GET"
      data-path="api/v1/admin/exams/{id}/statistics"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exams--id--statistics', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exams--id--statistics"
                    onclick="tryItOut('GETapi-v1-admin-exams--id--statistics');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exams--id--statistics"
                    onclick="cancelTryOut('GETapi-v1-admin-exams--id--statistics');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exams--id--statistics"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exams/{id}/statistics</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exams--id--statistics"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exams--id--statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exams--id--statistics"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-exams--id--statistics"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-subjects">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-subjects">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/subjects"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/subjects';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/subjects';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/subjects");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-subjects">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-subjects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-subjects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-subjects"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-subjects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-subjects">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-subjects" data-method="GET"
      data-path="api/v1/admin/subjects"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-subjects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-subjects"
                    onclick="tryItOut('GETapi-v1-admin-subjects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-subjects"
                    onclick="cancelTryOut('GETapi-v1-admin-subjects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-subjects"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/subjects</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-subjects"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-subjects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-subjects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-subjects">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-subjects">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/subjects"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Mathematics",
    "code": "MATH101",
    "section": "Science",
    "duration_minutes": 90,
    "max_score": 100,
    "has_essay_questions": false,
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/subjects';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Mathematics',
            'code' =&gt; 'MATH101',
            'section' =&gt; 'Science',
            'duration_minutes' =&gt; 90,
            'max_score' =&gt; 100,
            'has_essay_questions' =&gt; false,
            'is_active' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/subjects';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Mathematics',
    'code' =&gt; 'MATH101',
    'section' =&gt; 'Science',
    'duration_minutes' =&gt; 90,
    'max_score' =&gt; 100,
    'has_essay_questions' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/subjects");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Mathematics',
    'code' =&gt; 'MATH101',
    'section' =&gt; 'Science',
    'duration_minutes' =&gt; 90,
    'max_score' =&gt; 100,
    'has_essay_questions' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-subjects">
</span>
<span id="execution-results-POSTapi-v1-admin-subjects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-subjects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-subjects"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-subjects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-subjects">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-subjects" data-method="POST"
      data-path="api/v1/admin/subjects"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-subjects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-subjects"
                    onclick="tryItOut('POSTapi-v1-admin-subjects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-subjects"
                    onclick="cancelTryOut('POSTapi-v1-admin-subjects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-subjects"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/subjects</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-subjects"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-subjects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-subjects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-subjects"
               value="Mathematics"
               data-component="body">
    <br>
<p>Name of the subject. Must not be greater than 255 characters. Example: <code>Mathematics</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-v1-admin-subjects"
               value="MATH101"
               data-component="body">
    <br>
<p>Unique code of the subject. Must not be greater than 50 characters. Example: <code>MATH101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="section"                data-endpoint="POSTapi-v1-admin-subjects"
               value="Science"
               data-component="body">
    <br>
<p>Section or category of the subject (optional). Must not be greater than 255 characters. Example: <code>Science</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_minutes</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration_minutes"                data-endpoint="POSTapi-v1-admin-subjects"
               value="90"
               data-component="body">
    <br>
<p>Default duration of exams for this subject in minutes. Must be at least 1. Example: <code>90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_score</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_score"                data-endpoint="POSTapi-v1-admin-subjects"
               value="100"
               data-component="body">
    <br>
<p>Maximum score achievable in this subject. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>has_essay_questions</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-admin-subjects" style="display: none">
            <input type="radio" name="has_essay_questions"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-subjects"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-subjects" style="display: none">
            <input type="radio" name="has_essay_questions"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-subjects"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the subject includes essay questions. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-admin-subjects" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-subjects"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-subjects" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-subjects"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the subject is active. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-subjects--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-subjects--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/subjects/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/subjects/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-subjects--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-subjects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-subjects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-subjects--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-subjects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-subjects--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-subjects--id-" data-method="GET"
      data-path="api/v1/admin/subjects/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-subjects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-subjects--id-"
                    onclick="tryItOut('GETapi-v1-admin-subjects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-subjects--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-subjects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-subjects--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/subjects/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-subjects--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-subjects--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subject. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-subjects--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-subjects--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/subjects/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Physics",
    "code": "PHYS101",
    "section": "Science",
    "duration_minutes": 90,
    "max_score": 100,
    "has_essay_questions": false,
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Physics',
            'code' =&gt; 'PHYS101',
            'section' =&gt; 'Science',
            'duration_minutes' =&gt; 90,
            'max_score' =&gt; 100,
            'has_essay_questions' =&gt; false,
            'is_active' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Physics',
    'code' =&gt; 'PHYS101',
    'section' =&gt; 'Science',
    'duration_minutes' =&gt; 90,
    'max_score' =&gt; 100,
    'has_essay_questions' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/subjects/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Physics',
    'code' =&gt; 'PHYS101',
    'section' =&gt; 'Science',
    'duration_minutes' =&gt; 90,
    'max_score' =&gt; 100,
    'has_essay_questions' =&gt; false,
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-subjects--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-subjects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-subjects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-subjects--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-subjects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-subjects--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-subjects--id-" data-method="PUT"
      data-path="api/v1/admin/subjects/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-subjects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-subjects--id-"
                    onclick="tryItOut('PUTapi-v1-admin-subjects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-subjects--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-subjects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-subjects--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/subjects/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/subjects/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subject. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="Physics"
               data-component="body">
    <br>
<p>Name of the subject. Must not be greater than 255 characters. Example: <code>Physics</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="PHYS101"
               data-component="body">
    <br>
<p>Unique code of the subject. Must not be greater than 50 characters. Example: <code>PHYS101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="section"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="Science"
               data-component="body">
    <br>
<p>Section or category of the subject (optional). Must not be greater than 255 characters. Example: <code>Science</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_minutes</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration_minutes"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="90"
               data-component="body">
    <br>
<p>Default duration of exams for this subject in minutes. Must be at least 1. Example: <code>90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_score</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_score"                data-endpoint="PUTapi-v1-admin-subjects--id-"
               value="100"
               data-component="body">
    <br>
<p>Maximum score achievable in this subject. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>has_essay_questions</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-subjects--id-" style="display: none">
            <input type="radio" name="has_essay_questions"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-subjects--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-subjects--id-" style="display: none">
            <input type="radio" name="has_essay_questions"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-subjects--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the subject includes essay questions. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-subjects--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-subjects--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-subjects--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-subjects--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the subject is active. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-subjects--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-subjects--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/subjects/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/subjects/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/subjects/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-subjects--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-subjects--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-subjects--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-subjects--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-subjects--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-subjects--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-subjects--id-" data-method="DELETE"
      data-path="api/v1/admin/subjects/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-subjects--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-subjects--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-subjects--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-subjects--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-subjects--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-subjects--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/subjects/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-subjects--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-subjects--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-subjects--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the subject. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-exam-questions">Display a paginated listing of exam questions.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exam-questions">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-questions"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-questions");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exam-questions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exam-questions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exam-questions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exam-questions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exam-questions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exam-questions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exam-questions" data-method="GET"
      data-path="api/v1/admin/exam-questions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exam-questions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exam-questions"
                    onclick="tryItOut('GETapi-v1-admin-exam-questions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exam-questions"
                    onclick="cancelTryOut('GETapi-v1-admin-exam-questions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exam-questions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exam-questions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exam-questions"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exam-questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exam-questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-exam-questions">Store a newly created exam question.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-exam-questions">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-questions"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "exam_id": 1,
    "question_text": "What is the capital of France?",
    "question_image": "https:\/\/example.com\/question1.png",
    "question_type": "multiple_choice",
    "options": [
        "Paris"
    ],
    "correct_answer": "Paris",
    "points": 5,
    "is_required": false,
    "help_text": "Remember to check European capitals.",
    "section_id": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'exam_id' =&gt; 1,
            'question_text' =&gt; 'What is the capital of France?',
            'question_image' =&gt; 'https://example.com/question1.png',
            'question_type' =&gt; 'multiple_choice',
            'options' =&gt; [
                'Paris',
            ],
            'correct_answer' =&gt; 'Paris',
            'points' =&gt; 5,
            'is_required' =&gt; false,
            'help_text' =&gt; 'Remember to check European capitals.',
            'section_id' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'question_text' =&gt; 'What is the capital of France?',
    'question_image' =&gt; 'https://example.com/question1.png',
    'question_type' =&gt; 'multiple_choice',
    'options' =&gt; [
        'Paris',
    ],
    'correct_answer' =&gt; 'Paris',
    'points' =&gt; 5,
    'is_required' =&gt; false,
    'help_text' =&gt; 'Remember to check European capitals.',
    'section_id' =&gt; 2,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-questions");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'question_text' =&gt; 'What is the capital of France?',
    'question_image' =&gt; 'https://example.com/question1.png',
    'question_type' =&gt; 'multiple_choice',
    'options' =&gt; [
        'Paris',
    ],
    'correct_answer' =&gt; 'Paris',
    'points' =&gt; 5,
    'is_required' =&gt; false,
    'help_text' =&gt; 'Remember to check European capitals.',
    'section_id' =&gt; 2,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-exam-questions">
</span>
<span id="execution-results-POSTapi-v1-admin-exam-questions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-exam-questions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-exam-questions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-exam-questions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-exam-questions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-exam-questions" data-method="POST"
      data-path="api/v1/admin/exam-questions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-exam-questions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-exam-questions"
                    onclick="tryItOut('POSTapi-v1-admin-exam-questions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-exam-questions"
                    onclick="cancelTryOut('POSTapi-v1-admin-exam-questions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-exam-questions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/exam-questions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-exam-questions"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>exam_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="exam_id"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="1"
               data-component="body">
    <br>
<p>ID of the exam this question belongs to. The <code>id</code> of an existing record in the exams table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="question_text"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="What is the capital of France?"
               data-component="body">
    <br>
<p>Text content of the question (optional if question_image is provided). Example: <code>What is the capital of France?</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="question_image"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="https://example.com/question1.png"
               data-component="body">
    <br>
<p>URL or path of an image for the question (optional). Example: <code>https://example.com/question1.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="question_type"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="multiple_choice"
               data-component="body">
    <br>
<p>Type of the question. Example: <code>multiple_choice</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>multiple_choice</code></li> <li><code>essay</code></li> <li><code>true_false</code></li> <li><code>fill_blank</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>options</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="options[0]"                data-endpoint="POSTapi-v1-admin-exam-questions"
               data-component="body">
        <input type="text" style="display: none"
               name="options[1]"                data-endpoint="POSTapi-v1-admin-exam-questions"
               data-component="body">
    <br>
<p>Individual option for multiple_choice question.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>correct_answer</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="correct_answer"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="Paris"
               data-component="body">
    <br>
<p>Correct answer for the question (format depends on question_type). Example: <code>Paris</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>points</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="points"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="5"
               data-component="body">
    <br>
<p>Points assigned to the question. Must be at least 0. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_required</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-exam-questions" style="display: none">
            <input type="radio" name="is_required"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-exam-questions"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-exam-questions" style="display: none">
            <input type="radio" name="is_required"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-exam-questions"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if answering the question is mandatory. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>help_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="help_text"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="Remember to check European capitals."
               data-component="body">
    <br>
<p>Optional hint or guidance for the question. Example: <code>Remember to check European capitals.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="section_id"                data-endpoint="POSTapi-v1-admin-exam-questions"
               value="2"
               data-component="body">
    <br>
<p>ID of the exam section this question belongs to (optional). The <code>id</code> of an existing record in the exam_sections table. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-exam-questions--id-">Display the specified exam question.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exam-questions--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exam-questions--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exam-questions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exam-questions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exam-questions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exam-questions--id-" data-method="GET"
      data-path="api/v1/admin/exam-questions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exam-questions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exam-questions--id-"
                    onclick="tryItOut('GETapi-v1-admin-exam-questions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exam-questions--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-exam-questions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exam-questions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exam-questions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exam-questions--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-exam-questions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam question. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-exam-questions--id-">Update the specified exam question in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-exam-questions--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "exam_id": 1,
    "question_text": "What is the capital of Germany?",
    "question_image": "https:\/\/example.com\/question1.png",
    "question_type": "multiple_choice",
    "options": [
        "Berlin"
    ],
    "correct_answer": "Berlin",
    "points": 5,
    "is_required": false,
    "help_text": "Consider European capitals.",
    "section_id": 2
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'exam_id' =&gt; 1,
            'question_text' =&gt; 'What is the capital of Germany?',
            'question_image' =&gt; 'https://example.com/question1.png',
            'question_type' =&gt; 'multiple_choice',
            'options' =&gt; [
                'Berlin',
            ],
            'correct_answer' =&gt; 'Berlin',
            'points' =&gt; 5,
            'is_required' =&gt; false,
            'help_text' =&gt; 'Consider European capitals.',
            'section_id' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'question_text' =&gt; 'What is the capital of Germany?',
    'question_image' =&gt; 'https://example.com/question1.png',
    'question_type' =&gt; 'multiple_choice',
    'options' =&gt; [
        'Berlin',
    ],
    'correct_answer' =&gt; 'Berlin',
    'points' =&gt; 5,
    'is_required' =&gt; false,
    'help_text' =&gt; 'Consider European capitals.',
    'section_id' =&gt; 2,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'question_text' =&gt; 'What is the capital of Germany?',
    'question_image' =&gt; 'https://example.com/question1.png',
    'question_type' =&gt; 'multiple_choice',
    'options' =&gt; [
        'Berlin',
    ],
    'correct_answer' =&gt; 'Berlin',
    'points' =&gt; 5,
    'is_required' =&gt; false,
    'help_text' =&gt; 'Consider European capitals.',
    'section_id' =&gt; 2,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-exam-questions--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-exam-questions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-exam-questions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-exam-questions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-exam-questions--id-" data-method="PUT"
      data-path="api/v1/admin/exam-questions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-exam-questions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-exam-questions--id-"
                    onclick="tryItOut('PUTapi-v1-admin-exam-questions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-exam-questions--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-exam-questions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-exam-questions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/exam-questions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/exam-questions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam question. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>exam_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="exam_id"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="1"
               data-component="body">
    <br>
<p>ID of the exam this question belongs to. The <code>id</code> of an existing record in the exams table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="question_text"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="What is the capital of Germany?"
               data-component="body">
    <br>
<p>Text content of the question (optional if question_image is provided). Example: <code>What is the capital of Germany?</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="question_image"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="https://example.com/question1.png"
               data-component="body">
    <br>
<p>URL or path of an image for the question (optional). Example: <code>https://example.com/question1.png</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>question_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="question_type"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="multiple_choice"
               data-component="body">
    <br>
<p>Type of the question. Example: <code>multiple_choice</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>multiple_choice</code></li> <li><code>essay</code></li> <li><code>true_false</code></li> <li><code>fill_blank</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>options</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="options[0]"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="options[1]"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               data-component="body">
    <br>
<p>Individual option for multiple_choice question.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>correct_answer</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="correct_answer"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="Berlin"
               data-component="body">
    <br>
<p>Correct answer for the question (format depends on question_type). Example: <code>Berlin</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>points</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="points"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="5"
               data-component="body">
    <br>
<p>Points assigned to the question. Must be at least 0. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_required</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-exam-questions--id-" style="display: none">
            <input type="radio" name="is_required"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-exam-questions--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-exam-questions--id-" style="display: none">
            <input type="radio" name="is_required"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-exam-questions--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates if answering the question is mandatory. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>help_text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="help_text"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="Consider European capitals."
               data-component="body">
    <br>
<p>Optional hint or guidance for the question. Example: <code>Consider European capitals.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>section_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="section_id"                data-endpoint="PUTapi-v1-admin-exam-questions--id-"
               value="2"
               data-component="body">
    <br>
<p>ID of the exam section this question belongs to (optional). The <code>id</code> of an existing record in the exam_sections table. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-exam-questions--id-">Remove the specified exam question from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-exam-questions--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-questions/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-exam-questions--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-exam-questions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-exam-questions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-exam-questions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-exam-questions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-exam-questions--id-" data-method="DELETE"
      data-path="api/v1/admin/exam-questions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-exam-questions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-exam-questions--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-exam-questions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-exam-questions--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-exam-questions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-exam-questions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/exam-questions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-exam-questions--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-exam-questions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-exam-questions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam question. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-exams--id--questions">Get sections (with questions) and unsectioned questions of an exam.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exams--id--questions">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exams/architecto/questions"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/questions';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exams/architecto/questions';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exams/architecto/questions");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exams--id--questions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exams--id--questions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exams--id--questions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exams--id--questions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exams--id--questions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exams--id--questions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exams--id--questions" data-method="GET"
      data-path="api/v1/admin/exams/{id}/questions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exams--id--questions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exams--id--questions"
                    onclick="tryItOut('GETapi-v1-admin-exams--id--questions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exams--id--questions"
                    onclick="cancelTryOut('GETapi-v1-admin-exams--id--questions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exams--id--questions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exams/{id}/questions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exams--id--questions"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exams--id--questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exams--id--questions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-exams--id--questions"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-exam-sections">GET api/v1/admin/exam-sections</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exam-sections">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-sections"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-sections");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exam-sections">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exam-sections" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exam-sections"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exam-sections"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exam-sections" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exam-sections">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exam-sections" data-method="GET"
      data-path="api/v1/admin/exam-sections"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exam-sections', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exam-sections"
                    onclick="tryItOut('GETapi-v1-admin-exam-sections');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exam-sections"
                    onclick="cancelTryOut('GETapi-v1-admin-exam-sections');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exam-sections"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exam-sections</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exam-sections"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exam-sections"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exam-sections"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-exam-sections">POST api/v1/admin/exam-sections</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-exam-sections">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-sections"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "exam_id": 1,
    "code": "SEC-A",
    "name": "Mathematics Section",
    "order_number": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'exam_id' =&gt; 1,
            'code' =&gt; 'SEC-A',
            'name' =&gt; 'Mathematics Section',
            'order_number' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'code' =&gt; 'SEC-A',
    'name' =&gt; 'Mathematics Section',
    'order_number' =&gt; 1,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-sections");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'code' =&gt; 'SEC-A',
    'name' =&gt; 'Mathematics Section',
    'order_number' =&gt; 1,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-exam-sections">
</span>
<span id="execution-results-POSTapi-v1-admin-exam-sections" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-exam-sections"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-exam-sections"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-exam-sections" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-exam-sections">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-exam-sections" data-method="POST"
      data-path="api/v1/admin/exam-sections"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-exam-sections', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-exam-sections"
                    onclick="tryItOut('POSTapi-v1-admin-exam-sections');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-exam-sections"
                    onclick="cancelTryOut('POSTapi-v1-admin-exam-sections');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-exam-sections"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/exam-sections</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-exam-sections"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>exam_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="exam_id"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="1"
               data-component="body">
    <br>
<p>ID of the exam this section belongs to. The <code>id</code> of an existing record in the exams table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="SEC-A"
               data-component="body">
    <br>
<p>Unique code for the exam section. Must not be greater than 255 characters. Example: <code>SEC-A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="Mathematics Section"
               data-component="body">
    <br>
<p>Name of the exam section. Must not be greater than 255 characters. Example: <code>Mathematics Section</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_number"                data-endpoint="POSTapi-v1-admin-exam-sections"
               value="1"
               data-component="body">
    <br>
<p>Order of the section within the exam. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-exam-sections--id-">GET api/v1/admin/exam-sections/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-exam-sections--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-exam-sections--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-exam-sections--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-exam-sections--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-exam-sections--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-exam-sections--id-" data-method="GET"
      data-path="api/v1/admin/exam-sections/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-exam-sections--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-exam-sections--id-"
                    onclick="tryItOut('GETapi-v1-admin-exam-sections--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-exam-sections--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-exam-sections--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-exam-sections--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/exam-sections/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-exam-sections--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-exam-sections--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam section. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-exam-sections--id-">PUT api/v1/admin/exam-sections/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-exam-sections--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "exam_id": 1,
    "code": "SEC-B",
    "name": "Physics Section",
    "order_number": 2
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'exam_id' =&gt; 1,
            'code' =&gt; 'SEC-B',
            'name' =&gt; 'Physics Section',
            'order_number' =&gt; 2,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'code' =&gt; 'SEC-B',
    'name' =&gt; 'Physics Section',
    'order_number' =&gt; 2,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'exam_id' =&gt; 1,
    'code' =&gt; 'SEC-B',
    'name' =&gt; 'Physics Section',
    'order_number' =&gt; 2,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-exam-sections--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-exam-sections--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-exam-sections--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-exam-sections--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-exam-sections--id-" data-method="PUT"
      data-path="api/v1/admin/exam-sections/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-exam-sections--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-exam-sections--id-"
                    onclick="tryItOut('PUTapi-v1-admin-exam-sections--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-exam-sections--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-exam-sections--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-exam-sections--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/exam-sections/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/exam-sections/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam section. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>exam_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="exam_id"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="1"
               data-component="body">
    <br>
<p>ID of the exam this section belongs to. The <code>id</code> of an existing record in the exams table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="SEC-B"
               data-component="body">
    <br>
<p>Unique code for the exam section. Must not be greater than 255 characters. Example: <code>SEC-B</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="Physics Section"
               data-component="body">
    <br>
<p>Name of the exam section. Must not be greater than 255 characters. Example: <code>Physics Section</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_number"                data-endpoint="PUTapi-v1-admin-exam-sections--id-"
               value="2"
               data-component="body">
    <br>
<p>Order of the section within the exam. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-exam-sections--id-">DELETE api/v1/admin/exam-sections/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-exam-sections--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/exam-sections/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-exam-sections--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-exam-sections--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-exam-sections--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-exam-sections--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-exam-sections--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-exam-sections--id-" data-method="DELETE"
      data-path="api/v1/admin/exam-sections/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-exam-sections--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-exam-sections--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-exam-sections--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-exam-sections--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-exam-sections--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-exam-sections--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/exam-sections/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-exam-sections--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-exam-sections--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-exam-sections--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the exam section. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-school-admins">List paginated school admins</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-school-admins">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/school-admins"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/school-admins';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/school-admins';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/school-admins");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-school-admins">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-school-admins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-school-admins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-school-admins"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-school-admins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-school-admins">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-school-admins" data-method="GET"
      data-path="api/v1/admin/school-admins"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-school-admins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-school-admins"
                    onclick="tryItOut('GETapi-v1-admin-school-admins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-school-admins"
                    onclick="cancelTryOut('GETapi-v1-admin-school-admins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-school-admins"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/school-admins</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-school-admins"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-school-admins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-school-admins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-school-admins">Create school admin: create user first then create school admin profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-school-admins">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/school-admins"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Tarek Hesham Sayed ElFarmawy",
    "email": "schooladmin@example.com",
    "phone": "01234567890",
    "national_id": "12345678901234",
    "password": "password123",
    "school_id": 1,
    "is_active": false,
    "admin_permissions": {
        "manage_students": true,
        "view_reports": true,
        "manage_school_settings": false,
        "manage_exams": true
    }
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/school-admins';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
            'email' =&gt; 'schooladmin@example.com',
            'phone' =&gt; '01234567890',
            'national_id' =&gt; '12345678901234',
            'password' =&gt; 'password123',
            'school_id' =&gt; 1,
            'is_active' =&gt; false,
            'admin_permissions' =&gt; [
                'manage_students' =&gt; true,
                'view_reports' =&gt; true,
                'manage_school_settings' =&gt; false,
                'manage_exams' =&gt; true,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/school-admins';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'schooladmin@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'school_id' =&gt; 1,
    'is_active' =&gt; false,
    'admin_permissions' =&gt; [
        'manage_students' =&gt; true,
        'view_reports' =&gt; true,
        'manage_school_settings' =&gt; false,
        'manage_exams' =&gt; true,
    ],
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/school-admins");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'name' =&gt; 'Tarek Hesham Sayed ElFarmawy',
    'email' =&gt; 'schooladmin@example.com',
    'phone' =&gt; '01234567890',
    'national_id' =&gt; '12345678901234',
    'password' =&gt; 'password123',
    'school_id' =&gt; 1,
    'is_active' =&gt; false,
    'admin_permissions' =&gt; [
        'manage_students' =&gt; true,
        'view_reports' =&gt; true,
        'manage_school_settings' =&gt; false,
        'manage_exams' =&gt; true,
    ],
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-school-admins">
</span>
<span id="execution-results-POSTapi-v1-admin-school-admins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-school-admins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-school-admins"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-school-admins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-school-admins">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-school-admins" data-method="POST"
      data-path="api/v1/admin/school-admins"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-school-admins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-school-admins"
                    onclick="tryItOut('POSTapi-v1-admin-school-admins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-school-admins"
                    onclick="cancelTryOut('POSTapi-v1-admin-school-admins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-school-admins"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/school-admins</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-school-admins"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="Tarek Hesham Sayed ElFarmawy"
               data-component="body">
    <br>
<p>Full name of the school admin. Must not be greater than 255 characters. Example: <code>Tarek Hesham Sayed ElFarmawy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="schooladmin@example.com"
               data-component="body">
    <br>
<p>Email address of the school admin (must be unique). Must be a valid email address. Must not be greater than 255 characters. Example: <code>schooladmin@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="01234567890"
               data-component="body">
    <br>
<p>Phone number of the school admin (must be unique). Must not be greater than 20 characters. Example: <code>01234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>national_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="national_id"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="12345678901234"
               data-component="body">
    <br>
<p>National ID of the school admin (14 digits, unique). Must be 14 digits. Example: <code>12345678901234</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="password123"
               data-component="body">
    <br>
<p>Password for the school admin account. Must be at least 8 characters. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="school_id"                data-endpoint="POSTapi-v1-admin-school-admins"
               value="1"
               data-component="body">
    <br>
<p>ID of the school to assign the admin to. The <code>id</code> of an existing record in the schools table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the school admin account should be active. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>admin_permissions</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>Permissions assigned to the school admin (optional).</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_students</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_students"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_students"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing students. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>view_reports</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.view_reports"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.view_reports"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow viewing reports. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_school_settings</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_school_settings"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_school_settings"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing school settings. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_exams</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_exams"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-school-admins" style="display: none">
            <input type="radio" name="admin_permissions.manage_exams"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-school-admins"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing exams. Example: <code>false</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-school-admins--id-">Show school admin details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-school-admins--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/school-admins/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/school-admins/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-school-admins--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-school-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-school-admins--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-school-admins--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-school-admins--id-" data-method="GET"
      data-path="api/v1/admin/school-admins/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-school-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-school-admins--id-"
                    onclick="tryItOut('GETapi-v1-admin-school-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-school-admins--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-school-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-school-admins--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/school-admins/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-school-admins--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-school-admins--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school admin. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-school-admins--id-">Update school admin and optionally its user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-school-admins--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/school-admins/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "school_id": 1,
    "is_active": false,
    "admin_permissions": {
        "manage_students": true,
        "view_reports": true,
        "manage_school_settings": false,
        "manage_exams": true
    }
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'school_id' =&gt; 1,
            'is_active' =&gt; false,
            'admin_permissions' =&gt; [
                'manage_students' =&gt; true,
                'view_reports' =&gt; true,
                'manage_school_settings' =&gt; false,
                'manage_exams' =&gt; true,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'school_id' =&gt; 1,
    'is_active' =&gt; false,
    'admin_permissions' =&gt; [
        'manage_students' =&gt; true,
        'view_reports' =&gt; true,
        'manage_school_settings' =&gt; false,
        'manage_exams' =&gt; true,
    ],
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/school-admins/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'school_id' =&gt; 1,
    'is_active' =&gt; false,
    'admin_permissions' =&gt; [
        'manage_students' =&gt; true,
        'view_reports' =&gt; true,
        'manage_school_settings' =&gt; false,
        'manage_exams' =&gt; true,
    ],
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-school-admins--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-school-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-school-admins--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-school-admins--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-school-admins--id-" data-method="PUT"
      data-path="api/v1/admin/school-admins/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-school-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-school-admins--id-"
                    onclick="tryItOut('PUTapi-v1-admin-school-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-school-admins--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-school-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-school-admins--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/school-admins/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/school-admins/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-school-admins--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-school-admins--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school admin. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="school_id"                data-endpoint="PUTapi-v1-admin-school-admins--id-"
               value="1"
               data-component="body">
    <br>
<p>ID of the school to assign the admin to. The <code>id</code> of an existing record in the schools table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indicates whether the school admin account is active. Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>admin_permissions</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>
<p>Permissions assigned to the school admin (optional).</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_students</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_students"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_students"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing students. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>view_reports</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.view_reports"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.view_reports"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow viewing reports. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_school_settings</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_school_settings"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_school_settings"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing school settings. Example: <code>false</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>manage_exams</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_exams"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-school-admins--id-" style="display: none">
            <input type="radio" name="admin_permissions.manage_exams"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-school-admins--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Allow managing exams. Example: <code>false</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-school-admins--id-">Delete school admin and its user (soft delete user)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-school-admins--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/school-admins/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/school-admins/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/school-admins/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-school-admins--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-school-admins--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-school-admins--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-school-admins--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-school-admins--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-school-admins--id-" data-method="DELETE"
      data-path="api/v1/admin/school-admins/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-school-admins--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-school-admins--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-school-admins--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-school-admins--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-school-admins--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-school-admins--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/school-admins/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-school-admins--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-school-admins--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-school-admins--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school admin. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-admin-schools">GET api/v1/admin/schools</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-schools">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/schools"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/schools';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/schools';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/schools");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-schools">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-schools" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-schools"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-schools"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-schools" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-schools">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-schools" data-method="GET"
      data-path="api/v1/admin/schools"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-schools', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-schools"
                    onclick="tryItOut('GETapi-v1-admin-schools');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-schools"
                    onclick="cancelTryOut('GETapi-v1-admin-schools');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-schools"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/schools</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-schools"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-admin-schools">POST api/v1/admin/schools</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-schools">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/schools"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "governorate_id": 1,
    "name": "Al Azhar School",
    "code": "S001",
    "address": "123 Main St",
    "phone": "+201234567890",
    "latitude": 30.123456,
    "longitude": 31.654321,
    "allowed_ip_range": "192.168.1.1-192.168.1.255",
    "is_active": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/schools';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'governorate_id' =&gt; 1,
            'name' =&gt; 'Al Azhar School',
            'code' =&gt; 'S001',
            'address' =&gt; '123 Main St',
            'phone' =&gt; '+201234567890',
            'latitude' =&gt; 30.123456,
            'longitude' =&gt; 31.654321,
            'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
            'is_active' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/schools';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'governorate_id' =&gt; 1,
    'name' =&gt; 'Al Azhar School',
    'code' =&gt; 'S001',
    'address' =&gt; '123 Main St',
    'phone' =&gt; '+201234567890',
    'latitude' =&gt; 30.123456,
    'longitude' =&gt; 31.654321,
    'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/schools");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'governorate_id' =&gt; 1,
    'name' =&gt; 'Al Azhar School',
    'code' =&gt; 'S001',
    'address' =&gt; '123 Main St',
    'phone' =&gt; '+201234567890',
    'latitude' =&gt; 30.123456,
    'longitude' =&gt; 31.654321,
    'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-schools">
</span>
<span id="execution-results-POSTapi-v1-admin-schools" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-schools"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-schools"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-schools" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-schools">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-schools" data-method="POST"
      data-path="api/v1/admin/schools"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-schools', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-schools"
                    onclick="tryItOut('POSTapi-v1-admin-schools');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-schools"
                    onclick="cancelTryOut('POSTapi-v1-admin-schools');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-schools"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/schools</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-schools"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-schools"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>governorate_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="governorate_id"                data-endpoint="POSTapi-v1-admin-schools"
               value="1"
               data-component="body">
    <br>
<p>ID of the governorate. The <code>id</code> of an existing record in the governorates table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-admin-schools"
               value="Al Azhar School"
               data-component="body">
    <br>
<p>Name of the school. Must not be greater than 255 characters. Example: <code>Al Azhar School</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="POSTapi-v1-admin-schools"
               value="S001"
               data-component="body">
    <br>
<p>Unique code of the school. Must not be greater than 50 characters. Example: <code>S001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-admin-schools"
               value="123 Main St"
               data-component="body">
    <br>
<p>Address of the school (optional). Must not be greater than 500 characters. Example: <code>123 Main St</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-admin-schools"
               value="+201234567890"
               data-component="body">
    <br>
<p>Phone number of the school (optional). Must not be greater than 20 characters. Example: <code>+201234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="POSTapi-v1-admin-schools"
               value="30.123456"
               data-component="body">
    <br>
<p>Latitude coordinate of the school (optional). Example: <code>30.123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="POSTapi-v1-admin-schools"
               value="31.654321"
               data-component="body">
    <br>
<p>Longitude coordinate of the school (optional). Example: <code>31.654321</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allowed_ip_range</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="allowed_ip_range"                data-endpoint="POSTapi-v1-admin-schools"
               value="192.168.1.1-192.168.1.255"
               data-component="body">
    <br>
<p>Allowed IP range for the school (optional). Must not be greater than 100 characters. Example: <code>192.168.1.1-192.168.1.255</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-admin-schools" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-schools"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-schools" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-schools"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the school is active (optional). Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-admin-schools--id-">GET api/v1/admin/schools/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-schools--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/schools/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/schools/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-schools--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-schools--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-schools--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-schools--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-schools--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-schools--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-schools--id-" data-method="GET"
      data-path="api/v1/admin/schools/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-schools--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-schools--id-"
                    onclick="tryItOut('GETapi-v1-admin-schools--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-schools--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-schools--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-schools--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/schools/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-schools--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-schools--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-admin-schools--id-">PUT api/v1/admin/schools/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-schools--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/schools/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "governorate_id": 1,
    "name": "Al Azhar School",
    "code": "S001",
    "address": "123 Main St",
    "phone": "+201234567890",
    "latitude": 30.123456,
    "longitude": 31.654321,
    "allowed_ip_range": "192.168.1.1-192.168.1.255",
    "is_active": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'governorate_id' =&gt; 1,
            'name' =&gt; 'Al Azhar School',
            'code' =&gt; 'S001',
            'address' =&gt; '123 Main St',
            'phone' =&gt; '+201234567890',
            'latitude' =&gt; 30.123456,
            'longitude' =&gt; 31.654321,
            'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
            'is_active' =&gt; false,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'governorate_id' =&gt; 1,
    'name' =&gt; 'Al Azhar School',
    'code' =&gt; 'S001',
    'address' =&gt; '123 Main St',
    'phone' =&gt; '+201234567890',
    'latitude' =&gt; 30.123456,
    'longitude' =&gt; 31.654321,
    'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/schools/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = [
    'governorate_id' =&gt; 1,
    'name' =&gt; 'Al Azhar School',
    'code' =&gt; 'S001',
    'address' =&gt; '123 Main St',
    'phone' =&gt; '+201234567890',
    'latitude' =&gt; 30.123456,
    'longitude' =&gt; 31.654321,
    'allowed_ip_range' =&gt; '192.168.1.1-192.168.1.255',
    'is_active' =&gt; false,
];

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'PUT',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-schools--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-schools--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-schools--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-schools--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-schools--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-schools--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-schools--id-" data-method="PUT"
      data-path="api/v1/admin/schools/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-schools--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-schools--id-"
                    onclick="tryItOut('PUTapi-v1-admin-schools--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-schools--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-schools--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-schools--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/schools/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/schools/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-schools--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>governorate_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="governorate_id"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="1"
               data-component="body">
    <br>
<p>ID of the governorate. The <code>id</code> of an existing record in the governorates table. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="Al Azhar School"
               data-component="body">
    <br>
<p>Name of the school. Must not be greater than 255 characters. Example: <code>Al Azhar School</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="S001"
               data-component="body">
    <br>
<p>Unique code of the school. Must not be greater than 50 characters. Example: <code>S001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="123 Main St"
               data-component="body">
    <br>
<p>Address of the school (optional). Must not be greater than 500 characters. Example: <code>123 Main St</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="+201234567890"
               data-component="body">
    <br>
<p>Phone number of the school (optional). Must not be greater than 20 characters. Example: <code>+201234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="30.123456"
               data-component="body">
    <br>
<p>Latitude coordinate of the school (optional). Example: <code>30.123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="31.654321"
               data-component="body">
    <br>
<p>Longitude coordinate of the school (optional). Example: <code>31.654321</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allowed_ip_range</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="allowed_ip_range"                data-endpoint="PUTapi-v1-admin-schools--id-"
               value="192.168.1.1-192.168.1.255"
               data-component="body">
    <br>
<p>Allowed IP range for the school (optional). Must not be greater than 100 characters. Example: <code>192.168.1.1-192.168.1.255</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-admin-schools--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-schools--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-schools--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-schools--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Whether the school is active. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-v1-admin-schools--id-">DELETE api/v1/admin/schools/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-schools--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/admin/schools/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/admin/schools/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/admin/schools/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'DELETE',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-schools--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-schools--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-schools--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-schools--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-schools--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-schools--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-schools--id-" data-method="DELETE"
      data-path="api/v1/admin/schools/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-schools--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-schools--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-schools--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-schools--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-schools--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-schools--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/schools/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-schools--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-schools--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-schools--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the school. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-me">Get current authenticated user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-me">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/me"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/me';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/me';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/me");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-me" data-method="GET"
      data-path="api/v1/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-me"
                    onclick="tryItOut('GETapi-v1-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-me"
                    onclick="cancelTryOut('GETapi-v1-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-me"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-logout">Logout user and revoke token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-logout">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/logout"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/logout';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/logout");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'POST',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-logout">
</span>
<span id="execution-results-POSTapi-v1-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-logout" data-method="POST"
      data-path="api/v1/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-logout"
                    onclick="tryItOut('POSTapi-v1-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-logout"
                    onclick="cancelTryOut('POSTapi-v1-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-logout"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-governorates">GET api/v1/governorates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-governorates">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/governorates"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/governorates';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/governorates';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/governorates");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-governorates">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-governorates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-governorates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-governorates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-governorates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-governorates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-governorates" data-method="GET"
      data-path="api/v1/governorates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-governorates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-governorates"
                    onclick="tryItOut('GETapi-v1-governorates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-governorates"
                    onclick="cancelTryOut('GETapi-v1-governorates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-governorates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/governorates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-governorates"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-governorates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-governorates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-governorates--id-">GET api/v1/governorates/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-governorates--id-">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/v1/governorates/architecto"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/v1/governorates/architecto';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/v1/governorates/architecto';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/v1/governorates/architecto");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-governorates--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-governorates--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-governorates--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-governorates--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-governorates--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-governorates--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-governorates--id-" data-method="GET"
      data-path="api/v1/governorates/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-governorates--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-governorates--id-"
                    onclick="tryItOut('GETapi-v1-governorates--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-governorates--id-"
                    onclick="cancelTryOut('GETapi-v1-governorates--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-governorates--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/governorates/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-governorates--id-"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-governorates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-governorates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-governorates--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the governorate. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-health">GET api/health</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-health">
<blockquote>Example request:</blockquote>


<div class="JS-example">
    <pre><code class="language-JS">const url = new URL(
    "http://45.245.146.33:8000/api/health"
);

const headers = {
    "Authorization": "Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="Laravel-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://45.245.146.33:8000/api/health';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="DartPad-example">
    <pre><code class="language-ts">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();
  final url = 'http://45.245.146.33:8000/api/health';

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url,
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print(response.data);
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>


<div class="Dio-example">
    <pre><code class="language-javascript">import 'dart:convert';
import 'package:dio/dio.dart';

void main() async {
  final dio = Dio();

  final url = Uri.parse("http://45.245.146.33:8000/api/health");

    final queryParams = {};

  final headers = {
        'Authorization': 'Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d',        'Content-Type': 'application/json',        'Accept': 'application/json'      };

  dynamic data;
    data = null;

  try {
    final response = await dio.request(
      url.toString(),
      data: data,
      queryParameters: queryParams,
      options: Options(
        method: 'GET',
        headers: headers,
      ),
    );
    print('Response: ${response.data}');
  } catch (e) {
    print('Request failed: $e');
  }
}</code></pre></div>

</span>

<span id="example-responses-GETapi-health">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;ok&quot;,
    &quot;timestamp&quot;: &quot;2025-09-29T17:03:20.389315Z&quot;,
    &quot;version&quot;: &quot;1.0.0&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-health" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-health"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-health"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-health" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-health">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-health" data-method="GET"
      data-path="api/health"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-health', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-health"
                    onclick="tryItOut('GETapi-health');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-health"
                    onclick="cancelTryOut('GETapi-health');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-health"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/health</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-health"
               value="Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d"
               data-component="header">
    <br>
<p>Example: <code>Bearer 38|ht7IhxN0YrfU2R4hQQkMwMgkLMiXPXunNR0tm29uafe1763d</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="JS">JS</button>
                                                        <button type="button" class="lang-button" data-language-name="Laravel">Laravel</button>
                                                        <button type="button" class="lang-button" data-language-name="DartPad">DartPad</button>
                                                        <button type="button" class="lang-button" data-language-name="Dio">Dio</button>
                            </div>
            </div>
</div>
</body>
</html>
