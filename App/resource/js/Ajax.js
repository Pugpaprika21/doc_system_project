class Ajax {
  constructor(type, dataType, url, data) {
    this.type = type;
    this.dataType = dataType;
    this.url = url;
    this.data = data;
  }

  run() {
    let return_resp = null; 
    $.ajax({
      async: false,
      global: false,
      type: this.type,
      dataType: this.dataType,
      url: this.url,
      data: this.data,
      success: function (response) {
        return_resp = response;
      },
      error: function (error) {
        return_resp = error;
      },
    });

    return return_resp;
  }

  ajaxForm() {
    
  }
}
