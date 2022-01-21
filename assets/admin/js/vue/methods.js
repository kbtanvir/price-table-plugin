const methods = {
  updatePriceTable: async function () {
   url = WP_EP + '/pages/1751';
    params = {
      'fields': {
        'pricing_table_settings': this.priceTableData,
        'enterprise_pack': this.enterprise_pack,
        'team_pack': this.team_pack,
        'lite_pack': this.lite_pack,
      },
    };
    let options = {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': WP_API.nonce,
      },
      body: JSON.stringify(params),
    };

    let req = await fetch(url, options);
    let res = await req.json();
    console.log(res);
    if (res) {
      alert('Saved');
    }
  },

  loadPriceTableData: async function () {
    url = WP_EP + '/pages/1751';

    let options = {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': WP_API.nonce,
      },
    };

    let req = await fetch(url, options);
    let res = await req.json();
    this.lite_pack = res.acf.lite_pack;
    this.team_pack = res.acf.team_pack;
    this.enterprise_pack = res.acf.enterprise_pack;

    let priceTableData = res.acf.pricing_table_settings;
    if (priceTableData !== '') {
      if (typeof priceTableData === 'object') {
        this.priceTableData = priceTableData;
      } else {
        this.priceTableData = JSON.parse(priceTableData);
      }
    }
  },
};