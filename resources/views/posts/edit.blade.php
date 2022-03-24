<x-layout>
    <x-slot name="title">
        投稿内容の変更 - お悩み相談
    </x-slot>
    <a class = "back_img">
    <div class="back-link">
        &laquo; <a href="{{ route('posts.show', $post) }}">戻る</a>
    </div>

    <h1>内容変更</h1>
    <p>ジャンル:: </p>



    <form method="post" action="{{ route('posts.update', $post) }}">
       @method('PATCH')
       @csrf
       <div class="form-group">
       <label>
           悩み
           <input type="text" name="title" value="{{ old('title', $post->title) }}">
       </label>
       @error('title')
         <div class="error">{{ $message }}</div>
       @enderror
       </div>
       <div class="form-group">
           {{-- todoリストにあるカテゴリを悩みのジャンルとして表示させる機能を実装予定 --}}
           <p name = "category">ジャンル：{{ old('category') }}</p>
        <select id = "selectcategory">
            <option value="勉強">勉強</option>
            <option value="部活動">部活動</option>
            <option value="友達">友達</option>
            <option value="恋愛">恋愛</option>
            <option value="進路">進路</option>
            <option value="学校行事">学校行事</option>
            <option value="趣味">趣味</option>
            <option value="その他">その他</option>
        </select>
        <input type="button" value="選択" onclick="clickGenre()"/>

        <script>
        function clickGenre(){
            const str = document.getElementById("selectcategory").value;

            document.getElementByName("category").textContent = str;
        }
        </script>
        @error('category')
         <div class="error">{{ $message }}</div>
        @enderror
       <label>
           内容
           <textarea name="body">{{ old('body', $post->body) }}</textarea>
        </label>
        @error('body')
         <div class="error">{{ $message }}</div>
        @enderror
        {{-- 画像添付機能も追加予定 --}}
        <label>
            <input id=”image” type=”file” name=”image“>{{ old('image') }}
        </label>
        @error('image')
         <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-button">
        <button>編集</button>
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
