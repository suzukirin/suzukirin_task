<h1>新規論文投稿</h1>
<form action="/tasks" method="post">
    @csrf
    <p>
        タイトル<br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>
    <p>
        内容<br>
        <textarea type="text" name="body" value="{{ old('body') }}"></textarea>
    </p>
    

  <input type="submit" value="Create Task">
  </form>

