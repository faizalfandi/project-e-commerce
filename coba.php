<style>
    :root {
  --shadows1: 5px 5px white;
  --shadows2: 5px 5px white;
  --shadows3: 5px 5px white;
}

body {
  background-color: black;
  margin: 0;
}
#space {
  position: fixed;
  background: black;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}
.particle, .particle::after {
  position: absolute;
  background: magenta;
}
.particle::after {
  content: "";
  right: 100vw;
}
.particle:nth-child(1){
  animation: move 15s infinite linear;
}
.particle:nth-child(2){
  animation: move 30s infinite linear;
}
.particle:nth-child(3){
  animation: move 60s infinite linear;
}
.particle:nth-child(1), .particle:nth-child(1)::after{
  box-shadow: var(--shadows1);
  width: 2px;
  height: 2px;
}
.particle:nth-child(2), .particle:nth-child(2)::after{
  box-shadow: var(--shadows2);
  width: 4px;
  height: 4px;
}
.particle:nth-child(3), .particle:nth-child(3)::after{
  box-shadow: var(--shadows3);
  width: 5px;
  height: 5px;
}
@keyframes move {
  from {transform: translateX(0vw);}
  to {transform: translateX(100vw);}
}
    </style>

<body>
  <div id="space">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
  </div>
</body>

<script>
    const maxWidth = window.screen.width;
const maxHeight = window.screen.height;

function Random(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min) + min);
}

function Shadows(amount){
  let shadow = "";
  for(let i = 0; i < amount; i++){
    shadow += Random(0, maxWidth) + "px " + Random(0, maxHeight) +    "px " + "rgb(255,"+ Random(0, 256) + "," + Random(0, 256) + "), ";
  }
  shadow += Random(0, maxWidth) + "px " + Random(0, maxHeight) + "px " + "rgb(255,"+ Random(0, 256) + "," + Random(0, 256) + ")";
  return(shadow);
}

for(let i = 1; i <= 3; i++){
  document.documentElement.style.setProperty('--shadows' + i, Shadows(100));
}
</script>