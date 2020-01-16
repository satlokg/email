<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 {!!$campaign->templates!!}
 <b><a href="{{route('unsubscribe',['email'=>$email])}}">Unsubscribe</a></b>
</body>
</html>