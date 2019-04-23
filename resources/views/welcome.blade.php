<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sports</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,500" rel="stylesheet">
  <link href="{{asset('welcome/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('welcome/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('welcome/css/owl.carousel.css')}}" rel="stylesheet">
  <link href="{{asset('welcome/css/owl.theme.default.min.css')}}" rel="stylesheet">
  <link href="{{asset('welcome/css/offcanvas.min.css')}}" rel="stylesheet">
  <link href="{{asset('welcome/css/style.css')}}" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div id="main-wrapper">
    @include('welcome.layout.header')
    @yield('content')
    @include('welcome.layout.footer')
  </div>


</body>

</html>

<script src="{{asset('welcome/js/jquery.min.js')}}"></script>
<script src="{{asset('welcome/js/owl.carousel.js')}}"></script>
<script src="{{asset('welcome/js/bootstrap.min.js')}}"></script>
<script src="{{asset('welcome/js/script.js')}}"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>

<script type="text/javascript">
  var notificationsWrapper = $('.dropdown-notifications');
  var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
  var notificationsCountElem = notificationsToggle.find('i[data-count]');
  var notificationsCount = parseInt(notificationsCountElem.data('count'));
  var notifications = notificationsWrapper.find('ul.dropdown-menu');


  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('{{env('
    PUSHER_APP_KEY ')}}', {
      cluster: 'mt1',
      encrypted: true
    });


  var existingNotifications = notifications.html();
  var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
  var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/` + avatar + `.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">okokok</strong>
                  <p class="notification-desc">okokokokok11111111</p>
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;

  notifications.append(newNotificationHtml + existingNotifications);
  // Subscribe to the channel we specified in our Laravel Event
  var channel = pusher.subscribe('Notify');

  // Bind a function to a Event (the full Laravel class)
  channel.bind('send-message', function(data) {
    var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
    var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/` + avatar + `.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">` + data.title + `</strong>
                  <p class="notification-desc">` + data.content + `</p>
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
    notifications.append(newNotificationHtml);

    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
  });
</script>

<script>
  $(document).ready(function() {
    $('#buttonSubmit').click(function() {
      var content = $('#inputComment').val();
      var id = $('#news_id').val();
      $.ajax({
        url: '{{ route("comment", $news->first()->id ) }}',
        type: 'POST',
        data: {
          content: content,
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          $('#appendHTML').append(data);
        },
      });
    });
  });
</script>