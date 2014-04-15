(function($){
    $.fn.rotator = function(options){
		var randomnumber=Math.floor(Math.random()*101);
        var settings = $.extend({
            starting: 0,
            ending: randomnumber,
            percentage: true,
            color: '#4ec9d0',
            lineWidth: 13,
            timer: 50,
            radius: 52,
            fontStyle: 'Arial',
            fontSize: '17pt',
            fontColor: '#66cdd4',
            backgroundColor: '#e5e5e5',
            callback: function () {
            }
        }, options);
        this.empty().append("<canvas height ="+this.height() + " width="+this.width()+" id='my-canvas'/ ></canvas>");
        var canvas = document.getElementById('my-canvas');
        var x = canvas.width / 2;
        var y = canvas.height / 2;
        var radius = settings.radius;
        var context = canvas.getContext("2d");
        if(settings.backgroundColor){
            var ctx = canvas.getContext('2d');
            ctx.arc(x, y, radius, 0, 2*Math.PI, false);
            ctx.strokeStyle = settings.backgroundColor;
            ctx.lineWidth = settings.lineWidth;
            ctx.stroke()
        }
        var steps = settings.ending - settings.starting;
        var step = settings.starting;
        var z = setInterval(function(){
            var text;
            if(settings.percentage){text = step + "%"}else{text = step}
            var start_angle = (1.5 + (step/50))*Math.PI;
            var end_angle = (1.5 + (++step/50))*Math.PI;
            context.beginPath();
            context.arc(x, y, radius, start_angle, end_angle, false);
            context.lineWidth = settings.lineWidth;
            context.strokeStyle = settings.color;
            context.stroke();
            context.font = settings.fontSize + ' ' + settings.fontStyle;
            context.textAlign = 'center';
            context.textBaseline = 'middle';
            context.fillStyle = settings.fontColor;
            context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
            context.fillText(text, x , y );
            if(step >= steps){
                window.clearInterval(z);
                if(settings.percentage){text = step + "%"}else{text = step}
                context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
                context.fillText(text, x , y );
                if(typeof(settings.callback) == 'function'){
                    settings.callback.call(this);
                }
            }
        }, settings.timer)
    }
}(jQuery));

/* canvas */

(function($){
    $.fn.rotator1 = function(options1){
		var randomnumber1=Math.floor(Math.random()*101);
        var settings = $.extend({
            starting: 0,
            ending: randomnumber1,			
            percentage: true,
            color: '#ed7236',
            lineWidth: 13,
            timer: 50,
            radius: 52,
            fontStyle: 'Arial',
            fontSize: '17pt',
            fontColor: '#ed7236',
            backgroundColor: '#e5e5e5',
            callback: function () {
            }
        }, options1);
        this.empty().append("<canvas height ="+this.height() + " width="+this.width()+" id='my-canvas1'/ ></canvas>");
        var canvas = document.getElementById('my-canvas1');
        var x = canvas.width / 2;
        var y = canvas.height / 2;
        var radius = settings.radius;
        var context = canvas.getContext("2d");
        if(settings.backgroundColor){
            var ctx = canvas.getContext('2d');
            ctx.arc(x, y, radius, 0, 2*Math.PI, false);
            ctx.strokeStyle = settings.backgroundColor;
            ctx.lineWidth = settings.lineWidth;
            ctx.stroke()
        }
        var steps = settings.ending - settings.starting;
        var step = settings.starting;
        var z = setInterval(function(){
            var text;
            if(settings.percentage){text = step + "%"}else{text = step}
            var start_angle = (1.5 + (step/50))*Math.PI;
            var end_angle = (1.5 + (++step/50))*Math.PI;
            context.beginPath();
            context.arc(x, y, radius, start_angle, end_angle, false);
            context.lineWidth = settings.lineWidth;
            context.strokeStyle = settings.color;
            context.stroke();
            context.font = settings.fontSize + ' ' + settings.fontStyle;
            context.textAlign = 'center';
            context.textBaseline = 'middle';
            context.fillStyle = settings.fontColor;
            context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
            context.fillText(text, x , y );
            if(step >= steps){
                window.clearInterval(z);
                if(settings.percentage){text = step + "%"}else{text = step}
                context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
                context.fillText(text, x , y );
                if(typeof(settings.callback) == 'function'){
                    settings.callback.call(this);
                }
            }
        }, settings.timer)
    }
}(jQuery));

/* canvas1 */

(function($){
    $.fn.rotator2 = function(options2){
		var randomnumber2=Math.floor(Math.random()*101);
        var settings = $.extend({
            starting: 0,
            ending: randomnumber2,
            percentage: true,
			currentAmount: 50,
            color: '#f377ab',
            lineWidth: 13,
            timer: 50,
            radius: 52,
            fontStyle:'Arial',
            fontSize: '17pt',
            fontColor: '#f377ab',
            backgroundColor: '#e5e5e5',
            callback: function () {
            }
        }, options2);
        this.empty().append("<canvas height ="+this.height() + " width="+this.width()+" id='my-canvas2'/ ></canvas>");
        var canvas = document.getElementById('my-canvas2');
        var x = canvas.width / 2;
        var y = canvas.height / 2;
        var radius = settings.radius;
        var context = canvas.getContext("2d");
        if(settings.backgroundColor){
            var ctx = canvas.getContext('2d');
            ctx.arc(x, y, radius, 0, 2*Math.PI, false);
            ctx.strokeStyle = settings.backgroundColor;
            ctx.lineWidth = settings.lineWidth;
            ctx.stroke()
        }
        var steps = settings.ending - settings.starting;
        var step = settings.starting;
        var z = setInterval(function(){
            var text;
            if(settings.percentage){text = step + "%"}else{text = step}
            var start_angle = (1.5 + (step/50))*Math.PI;
            var end_angle = (1.5 + (++step/50))*Math.PI;
            context.beginPath();
            context.arc(x, y, radius, start_angle, end_angle, false);
            context.lineWidth = settings.lineWidth;
            context.strokeStyle = settings.color;
            context.stroke();
            context.font = settings.fontSize + ' ' + settings.fontStyle;
            context.textAlign = 'center';
            context.textBaseline = 'middle';
            context.fillStyle = settings.fontColor;
            context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
            context.fillText(text, x , y );
            if(step >= steps){
                window.clearInterval(z);
                if(settings.percentage){text = step + "%"}else{text = step}
                context.clearRect(x - parseInt(settings.fontSize)*1.5, y - parseInt(settings.fontSize)/2, parseInt(settings.fontSize)*3, parseInt(settings.fontSize));
                context.fillText(text, x , y );
                if(typeof(settings.callback) == 'function'){
                    settings.callback.call(this);
                }
            }
        }, settings.timer)
    }
}(jQuery));

