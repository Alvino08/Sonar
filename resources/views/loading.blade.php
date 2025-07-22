<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/css/app.css', 'resources/js/loading.js'])
  <title>Layered Scroll</title>
  <style>
    #container {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .panel {
      width: 100%;
      height: 100vh;
      position: absolute;
      will-change: transform;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 30px;
      font-weight: 900;
    }

    .panel.red {
      background: red;
    }

    .panel.purple {
      background: purple;
    }

    .panel.tomato {
      background: tomato;
    }

    section.content {
      position: relative;
      height:300vh;
      background-color:teal;
      color:#fff;
      display: flex; 
      flex-direction: column;
      align-items: center;
      justify-content: space-around;
    }

    h1{
      color: white;
      font-size: 30px;
      font-weight: 900;
    }
  </style>
</head>
<body>
  <div data-scroll-container> 
    <section id="container"> 
      <div class="panel red">
        <div>
          ONE
        </div>
      </div>
      <div class="panel purple">
        <div>
          TWO
        </div>
      </div>
      <div class="panel tomato">
        <div>
          THREE
        </div>
      </div>
    </section>
    <section class="content">
      <h1>Content outside of layered pinning</h1>
      <h1>Content outside of layered pinning</h1>
      <h1>Content outside of layered pinning</h1>
    </section>
  </div>


</body>
</html>
