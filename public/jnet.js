/**
 * Raw     : https://raw.githubusercontent.com/lamhotsimamora/jnet/master/dist/js/jnet.js
 * Author  : @lamhotsimamora | { Jnet }
 * Updated April 2020
 * Copyright@2020
 */

const __init = {
    header: 'application/x-www-form-urlencoded; charset=UTF-8'
}

function __isFunc(f) {
    var t = {};
    return f && t.toString.call(f) === '[object Function]'
}

function __dbg(message) {
    console.error('[jnet] ' + message);
}

class _jnet {
    constructor(init) {
        if (init) {
            this.url = init.url;
            this.method = init.method;
            this.data = init.data;
            this.header = init.header;
            this.auto = (init.auto === undefined) ? true : init.auto;
            this.async = (init.async === undefined) ? true : init.async;
        } else {
            __dbg('Kamu harus memasukkan data init');
        }
        return this;
    }

    request(callback, error) {
        let method = this.method === undefined ? 'GET' : this.method;
        let url = this.url;
        let auto = this.auto;
        let form_data = null;
        if (url) {
            method = method.toUpperCase();
            if (method === 'POST') {
                let i = 0;
                for (let key in this.data) {
                    if (key === 'length' || !this.data.hasOwnProperty(key)) {
                        continue
                    }
                    let value = this.data[key];
                    (i == 0) ? form_data = key + '=' + value: form_data += '&' + key + '=' + value;
                    i++
                }
            }

            let xmlHttpRequest = XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHttp');
            xmlHttpRequest.onreadystatechange = function() {
                if (auto == false) {
                    return callback(this);
                } else {
                    if (this.readyState == 4 && this.status == 200) {
                        if (callback != undefined && __isFunc(callback)) {
                            return callback(this.responseText, this)
                        } else {
                            __dbg('Callback tidak ada');
                        }
                    } else {
                        if (this.readyState == 4 && this.status == 404) {
                            return callback(JSON.stringify({
                                message: 'Not Found',
                                status: 404
                            }), this)
                        }
                    }
                }
            };
            xmlHttpRequest.onerror = function() {
                if (__isFunc(error)) {
                    return error(this);
                }
            };
            try {
                xmlHttpRequest.open(method, url, this.async);
                let header = (this.header) ? (this.header) : __init.header;
                xmlHttpRequest.setRequestHeader('Content-Type', header);
                xmlHttpRequest.send(form_data)
            } catch (error) {
                __dbg("error ajax request { " + method + " } -> " + error);
            }
            return this;
        }

    }
}


function jnet(init) {
    if (init) {
        return new _jnet(init)
    }
}