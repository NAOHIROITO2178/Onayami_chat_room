<x-layout>
    <x-slot name="title">
        お悩み投稿 - なんでも相談ルーム
    </x-slot>
    <a class = "back_img">
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">戻る</a>
    </div>

    <h1>お悩み投稿</h1>
    <p>ジャンル:: </p>

        <select name="GenreCategoty">
            <option value="選択してください">未選択</option>
            <option value="勉強">勉強</option>
            <option value="部活">部活</option>
            <option value="友達">友達</option>
            <option value="恋愛">恋愛</option>
            <option value="進路">進路</option>
            <option value="学校行事">学校行事</option>
            <option value="趣味">趣味</option>
            <option value="その他">その他</option>
        </select>
        <input type="button" value="選択" onclick="clickGenre()"/>

        <script type="text/javascript">
        function clickGenre(){
            const str = document.getElementById("Genre").value;

            document.getElementById("spanGenre").textContent = str;
        }
        </script>

    <form method="post" action="{{ route('posts.store') }}">
       @csrf
       <div class="form-group">
       <label>
           悩み
           <input type="text" name="title" value="{{ old('title') }}">
       </label>
       @error('title')
         <div class="error">{{ $message }}</div>
       @enderror
       </div>
       <div class="form-group">
       <label>
           内容
           <textarea name="body">{{ old('body') }}</textarea>
        </label>
        @error('body')
         <div class="error">{{ $message }}</div>
        @enderror

        </div>
        <div class="form-button">
        <button>投稿</button>
        </div>
    </form>
    <footer>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <span id="ShowNowTime"></span>

        <script type="text/javascript">
          timerID = setInterval('time()', 500);

          function minute2keta(num) {
            let addketa;
            if (num < 10) {
              addketa = "0" + num;
            } else {
              addketa = num;
            }
            return addketa;
          }

          function time() {
            document.getElementById("ShowNowTime").innerHTML = now();
          }

          function now() {
            let nowTime = new Date();
            let year = nowTime.getFullYear();
            let mon = nowTime.getMonth() + 1;
            let day = nowTime.getDate();
            let you = nowTime.getDay();
            let week = new Array("日", "月", "火", "水", "木", "金", "土");
            let hour = nowTime.getHours();
            let min = minute2keta(nowTime.getMinutes());

            let view = year + " " + mon + "/" + day + "(" + week[you] + ") " + hour + ":" + min;
            return view;
          }
        </script>
      </footer>
    </a>
</x-layout>
