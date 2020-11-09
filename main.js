const APP = {
    lightBtn: document.querySelector('.jasny'),
    darkBtn: document.querySelector('.ciemny'),
    normalBtn: document.querySelector('.normal'),

    light: function(){
        document.body.style.backgroundColor = "lightpink";
    },

    dark: function(){
        document.body.style.backgroundColor = "gray";
    },

    normal: function(){
        document.body.style.backgroundColor = "aqua";
    },

    init:function(){
        this.lightBtn.addEventListener('click',this.light.bind(this));
        this.darkBtn.addEventListener('click',this.dark.bind(this));
        this.normalBtn.addEventListener('click',this.normal.bind(this));
    }
}

APP.init();