// /postsのURLにPOSTリクエストでフォームに入力されたデータを送信する。
<form method="POST" action="/posts">
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="text" name="content">
    <input type="submit">
</form>