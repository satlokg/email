<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 {!!$campaign->templates!!}
 <b><a href="{{route('unsubscribe',['email'=>$emaile])}}">Unsubscribe</a></b>
</body>
</html>