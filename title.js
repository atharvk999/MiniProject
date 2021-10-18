(function title(label, desc, path) {
  // return the title component after setting the arguments at correct position
  document.querySelector("#title").innerHTML =  `
    <div>
      <h1><i class="fa fa-calendar"></i><span id="page-title"></span></h1>
      <p id="page-desc"></p>
    </div>
  `;
})();
