const $ = jQuery.noConflict();

(function setupVue() {
  let el = '#tixioPTwrapper';
  let s = document.querySelector(el);

  if (s === null) return;

  let plugin = new Vue({
    el,
    data: function () {
      return {
        priceTableData: priceTableData,
        lite_pack: { button_text: '', button_url: '' },
        team_pack: { button_text: '', button_url: '' },
        enterprise_pack: { button_text: '', button_url: '' },
      };
    },
    methods,
    created() {
      this.loadPriceTableData();
    },
  });
})();
