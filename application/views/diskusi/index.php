<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Diskusi Bareng</h1>
    <span>Ngobrol santai seputar pertanian</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Diskusi</li>
    </ol>
  </div>

</section>
<section id="content">
  <div class="content-wrap">
    <div class="container">
      <div id="cometchat"></div>
    </div>
  </div>
</section>

 <script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
      CometChatWidget.init({
        "appID": "1923460f9a6469cc",
        "appRegion": "us",
        "authKey": "597bcee80fb25e9582df03990b079bce868df9f1"
      }).then(response => {
        console.log("Initialization completed successfully");
        //You can now call login function.
        CometChatWidget.login({
          "uid": "<?= $this->session->userdata('username'); ?>"
        }).then(response => {
          CometChatWidget.launch({
            "widgetID": "f9902687-d5ca-4af5-a8e8-3c873ae734ac",
            "target": "#cometchat",
            "roundedCorners": "true",
            "height": "80vh",
            "width": "100%",
            "defaultID": '<?= $this->session->userdata("username"); ?>', //default UID (user) or GUID (group) to show,
            "defaultType": 'user' //user or group
          });
        }, error => {
          console.log("User login failed with error:", error);
          //Check the reason for error and take appropriate action.
        });
      }, error => {
        console.log("Initialization failed with error:", error);
        //Check the reason for error and take appropriate action.
      });
    });
</script>
<?php $this->load->view('layout/footer'); ?>

