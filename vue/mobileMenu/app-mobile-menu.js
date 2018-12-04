var app = new Vue({
  el: "#site-header",
  data() {
    return {
      mobileMenu: false
    };
  },
  methods: {
    menuToggle() {
      this.mobileMenu = !this.mobileMenu;
      let page = document.getElementById("page");
      if ( this.mobileMenu == true ) {
        page.style.position = "fixed";
      } else {
        page.style.position = "relative";
      }
    }
  }
});