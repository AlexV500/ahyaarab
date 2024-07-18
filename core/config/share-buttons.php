<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Representation
    |--------------------------------------------------------------------------
    |
    | These values specify representations for different visual parts of buttons.
    |
    | Visual block/Visual container representation:
    | - 'block_prefix' represents a share buttons block start
    | - 'block_suffix' represents a share buttons block end
    | Each element representation:
    | - 'element_prefix' represents an element start
    | - 'element_suffix' represents an element end
    |
    */

    'block_prefix' => '<div id="social-buttons">',
    'block_suffix' => '</div>',
    'element_prefix' => '',
    'element_suffix' => '',

    /*
    |--------------------------------------------------------------------------
    | Share buttons
    |--------------------------------------------------------------------------
    |
    | These values specify configuration settings for each social media button.
    | The settings include a sharing url, a default text in the url, some extras.
    | The format of substitution depends on a templater (see Templaters section).
    | Note: It is allowed to provide a site's url to the copylink button, because
    | some people might want to see it there, even though using a hash is enough.
    |
    */

    'buttons' => [
        'copylink' => [
            'url' => ':url',
            'extra' => [
                'raw' => 'true',
                'hash' => 'true',
            ],
        ],
        'diigo' => [
            'url' => 'http://www.diigo.com/post?url=:url%&title=:text',
            'text' => 'Default share text',
        ],
        'blogger' => [
            'url' => 'https://www.blogger.com/blog_this.pyra?t&u=:url%&l&n=:text',
            'text' => 'Default share text',
        ],
        'draugiem' => [
            'url' => 'https://www.draugiem.lv/say/ext/add.php?link=:url%&title=:text',
            'text' => 'Default share text',
        ],
        'evernote' => [
            'url' => 'https://www.evernote.com/clip.action?url=:url&t=:text',
            'text' => 'Default share text',
        ],
        'facebook' => [
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=:url&quote=:text',
            'text' => 'Default share text',
        ],
        'flipboard' => [
            'url' => 'https://share.flipboard.com/bookmarklet/popout?v=2&url=:url&title=:text',
            'text' => 'Default share text',
        ],
        'google_classroom' => [
            'url' => 'https://classroom.google.com/u/0/share?url=:url',
            'text' => 'Default share text',
        ],

        'hackernews' => [
            'url' => 'https://news.ycombinator.com/submitlink?t=:text&u=:url',
            'text' => 'Default share text',
        ],
        'instagram' => [
            'url' => 'https://instagram.com/sharer.php?url=:url',
            'text' => 'Default share text',
        ],
        'linkedin' => [
            'url' => 'https://www.linkedin.com/sharing/share-offsite?mini=true&url=:url&title=:text&summary=:summary',
            'text' => 'Default share text',
            'extra' => [
                'summary' => '',
            ],
        ],
        'livejournal' => [
            'url' => 'http://www.livejournal.com/update.bml?subject=:text&event=:url',
            'text' => 'Default share text',
        ],
        'kakao' => [
            'url' => 'https://story.kakao.com/share?url=:url',
            'text' => 'Default share text',
        ],
        'mastodon' => [
            'url' => 'https://mastodonshare.com/?text=:text&url=:url',
            'text' => 'Default share text',
        ],
        'mix' => [
            'url' => 'https://mix.com/mixit?url=:url',
            'text' => 'Default share text',
        ],
        'mailto' => [
            'url' => 'mailto:?subject=:text&body=:url',
            'text' => 'Default share text',
        ],
        'pinterest' => [
            'url' => 'https://pinterest.com/pin/create/button/?url=:url',
        ],
        'pocket' => [
            'url' => 'https://getpocket.com/edit?url=:url&title=:text',
            'text' => 'Default share text',
        ],
        'reddit' => [
            'url' => 'https://www.reddit.com/submit?title=:text&url=:url',
            'text' => 'Default share text',
        ],
        'skype' => [
            'url' => 'https://web.skype.com/share?url=:url&text=:text&source=button',
            'text' => 'Default share text',
        ],
        'telegram' => [
            'url' => 'https://telegram.me/share/url?url=:url&text=:text',
            'text' => 'Default share text',
        ],
        'twitter' => [
            'url' => 'https://twitter.com/intent/tweet?text=:text&url=:url',
            'text' => 'Default share text',
        ],
        'vkontakte' => [
            'url' => 'https://vk.com/share.php?url=:url&title=:text',
            'text' => 'Default share text',
        ],
        'whatsapp' => [
            'url' => 'https://wa.me/?text=:url%20:text',
            'text' => 'Default share text',
        ],
        'xing' => [
            'url' => 'https://www.xing.com/spi/shares/new?url=:url',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | These values specify link templates for each of the social media buttons.
    | The format of substitution depends on a templater (see Templaters section).
    | Note: Don't remove the social-button class from links because it's used in js.
    |
    */

    'templates' => [
        'copylink' => '<a href=":url" class="social-button:class" id="clip":title:rel><span class="fas fa-share"></span></a>',
        'blogger' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-blogger"></span></a>',

        'diigo' => '<a href=":url" class="social-button:class":id:title:rel>
<span style="background-color:#4a8bca;
width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0px 0px 0px 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box"><svg style="%inner_style%" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 32 32"><path fill-rule="evenodd" clip-rule="evenodd" fill="%logo_color%" d="M23.81 4.5c.012.198.035.396.035.593 0 4.807.026 9.615-.01 14.422-.02 3.248-1.5 5.678-4.393 7.158-4.66 2.385-10.495-.64-11.212-5.836-.76-5.517 3.747-9.56 8.682-9.018 1.114.12 2.16.5 3.134 1.07.517.3.527.295.53-.29.007-2.7.01-5.4.014-8.103h3.22zm-7.914 19.97c2.608.068 4.82-2.025 4.954-4.552.138-2.626-1.89-5.074-4.727-5.145-2.7-.067-4.867 2-4.973 4.71-.107 2.72 2.13 5.008 4.746 4.988z"/></svg></span>

</a>',
        'draugiem' => '<a href=":url" class="social-button:class":id:title:rel>
<span class="" style="background-color:#ffad66;
width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0px 0px 0px 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box">
<svg style="%inner_style%" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="-4 -4 40 40"><path fill="%logo_color%" d="M21.55 11.33c4.656.062 7.374 2.92 4.294 6.828-1.415 1.798-3.812 3.575-7.003 4.725-.15.056-.303.105-.46.16-.3.098-.595.188-.89.28a24.866 24.866 0 0 1-4.05.814c-.464.043-.91.078-1.35.085-2.97.077-5.205-.74-5.93-2.474-.88-2.077.9-4.976 4.454-7.178-2.627 1.06-7.408 3.546-7.61 7.12v.454c.02.362.09.725.21 1.108.76 2.41 4.333 3.533 8.884 3.13.446-.036.892-.092 1.352-.16.66-.1 1.337-.23 2.027-.39a35.76 35.76 0 0 0 2.02-.558c.154-.056.3-.098.454-.153.31-.094.608-.2.9-.31 3.945-1.436 6.87-3.34 8.58-5.526.975-1.253 1.476-2.424 1.574-3.448v-.787c-.28-2.61-3.317-4.135-7.45-3.717zm-3.024-1.29c.11 0 .21-.014.307-.035.662-.167.983-.87 1.01-1.7.028-.885-.286-1.624-1.01-1.728-.063-.014-.125-.014-.195-.014-.578 0-.955.348-1.157.857-.094.265-.16.564-.163.885-.014.383.034.745.167 1.038.196.418.53.697 1.046.697zm-.014.292c-.293 0-.544.028-.76.084l.063.084.11.202.092.21.077.215.056.223.035.223.02.23.008.223v.237l-.014.23-.018.23-.028.23-.028.23-.043.23-.042.23-.04.223-.056.223-.042.212-.056.21-.057.2-.057.196-.042.19-.04.18-.02.11-.03.125-.028.132-.02.14-.03.152-.02.124v.03l-.028.166-.056.21-.02.172-.03.18-.02.182-.03.18-.02.19-.03.18-.02.188-.02.188-.02.19v.007c.04.537.082.997.103 1.26.02.3.085.517.18.663.14.215.378.292.706.32.28-.028.487-.084.647-.23.153-.14.237-.376.3-.753.118-.774.467-3.31.767-4.397.425-1.568 1.456-4.418-1.066-4.634-.122-.024-.226-.024-.338-.024zm-3.06-.8h.015c.976-.008 1.436-.9 1.436-1.994s-.46-1.993-1.436-2h-.014c-.99 0-1.45.9-1.45 2s.46 1.993 1.45 1.993zm-2.013 4.626c.09.383.18.732.254 1.052.307 1.254.606 4.16.718 5.038.105.885.418 1.073 1.052 1.136.62-.063.94-.25 1.045-1.136.105-.878.41-3.79.71-5.038.08-.314.175-.67.266-1.052.28-1.15.502-2.495 0-3.366-.32-.557-.94-.92-2.02-.92-1.088 0-1.708.37-2.03.92-.5.864-.27 2.216 0 3.366zm-1.35-4.153c.1.02.196.035.308.035.516 0 .857-.28 1.045-.704.118-.293.174-.655.167-1.038a2.96 2.96 0 0 0-.167-.885c-.202-.51-.585-.857-1.157-.857-.07 0-.134 0-.197.014-.725.105-1.045.843-1.01 1.728.02.836.35 1.54 1.01 1.707zm-.3 9.373c.057.376.154.606.3.753.16.157.37.206.65.23.33-.024.557-.1.704-.32.09-.14.153-.36.18-.66.022-.264.064-.72.106-1.253v-.014l-.02-.187-.02-.188-.03-.188-.02-.18-.02-.19-.03-.18-.02-.18-.03-.183-.025-.174-.02-.166-.03-.167v-.02l-.02-.133-.028-.153-.028-.14-.024-.13-.028-.125-.03-.11-.034-.184-.056-.188-.04-.196-.058-.203-.056-.21-.056-.215-.04-.223-.057-.225-.04-.23-.033-.23-.028-.23-.03-.23-.02-.23-.008-.237v-.23l.007-.223.02-.23.034-.223.056-.222.07-.216.1-.21.11-.2.065-.085a3.128 3.128 0 0 0-.76-.083c-.11 0-.216 0-.32.014-2.524.216-1.492 3.066-1.067 4.634.262 1.054.603 3.59.728 4.364z"/></svg>
</span>
</a>',

        'evernote' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-evernote"></span></a>',

        'facebook' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-facebook"></span></a>',
        'flipboard' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-flipboard"></span></a>',

        'google_classroom' => '<a href=":url" class="social-button:class":id:title:rel>
<span class=""
 style="background-color:#ffc112;
 width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0px 0px 0px 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box">
 <svg style="%inner_style%" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="-2 2 36 36"><g fill="%logo_color%"><path d="M22.667 16.667a1.667 1.667 0 1 0 0-3.334 1.667 1.667 0 0 0 0 3.334zM22.333 18c-1.928 0-4 .946-4 2.117v1.217h8v-1.217c0-1.17-2.072-2.117-4-2.117zm-13-1.333a1.668 1.668 0 1 0-.002-3.336 1.668 1.668 0 0 0 .002 3.336zM9.667 18c-1.928 0-4 .946-4 2.117v1.217h8v-1.217c0-1.17-2.072-2.117-4-2.117z"/><path d="M15.335 15.333A2.332 2.332 0 1 0 13 13a2.333 2.333 0 0 0 2.335 2.333zm.332 1.334c-2.572 0-5.333 1.392-5.333 3.11v1.557H21v-1.556c0-1.72-2.762-3.11-5.333-3.11zm3 10.666h8v2h-8v-2z"/></g></svg>
 </span>
</a>',

        'hackernews' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-hacker-news"></span></a>',

        'linkedin' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-linkedin"></span></a>',
        'livejournal' => '<a href=":url" class="social-button:class":id:title:rel>
<span class="heateor_sss_svg heateor_sss_s__default heateor_sss_s_livejournal"
 style="background-color:#ededed;
 width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0px 0px 0px 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box
 ">
 <svg style="%inner_style%" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 32 32"><path fill="%logo_color%" d="M7.08 9.882l.004-.008.004-.01c.195-.408.422-.81.674-1.192.264-.393.53-.75.81-1.06 1.493-1.683 3.524-2.692 6.08-3.015l.733-.097.426.61 8.426 12.14.188.27.027.328.608 7.65.164 2.002-1.854-.783-7.23-3.053-.325-.143-.208-.286-8.422-12.14-.4-.574.3-.638zm2.72.13c-.06.097-.118.202-.18.305l7.79 11.235 5.05 2.13-.427-5.32-7.79-11.226c-1.603.326-2.884 1.032-3.84 2.102-.227.252-.428.514-.602.775z"/><path fill="#FFC805" d="M8.186 10.4c1.283-2.66 3.488-4.192 6.62-4.594l8.423 12.14.61 7.648-7.23-3.057L8.186 10.4z"/><path fill="%logo_color%" d="M15.158 6.316l1.89 2.717c-2.597.352-5.354 2.552-6.603 4.62l-1.898-2.735c1.115-2.09 4.27-4.18 6.61-4.602z"/><path fill="#9291AD" d="M13.285 10.666c-1.22.873-2.197 1.915-2.84 2.987l-1.898-2.735c.557-1.043 1.654-2.108 2.875-2.944l1.863 2.692z"/><path fill="%logo_color%" d="M7.215 10.283c1.35-3.24 4.182-4.8 7.568-5.527l.55-.026.38.397.314.322 1.14 1.817-1.835.243h-.012c-.242.038-.512.108-.8.212h-.003c-.3.1-.613.238-.957.406-1.69.837-3.4 2.216-3.898 3.306l-.928 1.746-1.252-1.66-.166-.285-.25-.453.15-.5z"/><path fill="#F5A8AA" d="M8.33 10.597c.95-2.725 3.1-4.214 6.504-4.615l.314.322c-2.3.35-5.756 2.777-6.598 4.62l-.22-.327z"/><path fill="#485E85" d="M23.69 22.727l.283 3.084-2.924-1.235 1.224-1.202"/><path fill="%logo_color%" d="M16.41 21.274c.053-.062.113-.133.176-.197.635-.712 1.287-1.447 1.43-2.695l-4.875-7.02c-.436.35-.832.706-1.176 1.062-.363.382-.674.775-.924 1.168l5.37 7.682zm.93.483c-.203.222-.398.445-.572.665l-.416.54-.402-.566-5.94-8.49-.183-.265.166-.282c.318-.558.73-1.097 1.236-1.63.494-.526 1.076-1.027 1.726-1.5l.424-.305.296.425 5.27 7.6.103.15-.014.17c-.113 1.718-.92 2.615-1.697 3.49z"/><path fill="#6A9AC2" d="M16.367 22.11c.846-1.09 2.03-1.903 2.164-3.868l-5.273-7.602c-1.27.914-2.227 1.933-2.83 2.97l5.94 8.5z"/><path fill="%logo_color%" d="M22.125 17.31c-.09.026-.168.062-.248.093-.89.35-1.81.71-3.027.396l-4.87-7.02c.48-.29.95-.53 1.405-.73.486-.208.96-.36 1.42-.464l5.32 7.724zm.12 1.037c.28-.11.563-.22.823-.294l.658-.21-.39-.568-5.888-8.532-.18-.267-.32.052c-.635.105-1.287.3-1.967.59-.66.286-1.67.887-2.342 1.33l5.893 8.313c1.647.49 2.627.014 3.717-.412z"/><path fill="#A1BBD6" d="M22.896 17.537c-1.312.41-2.498 1.232-4.383.67l-5.272-7.6c1.303-.87 2.59-1.412 3.77-1.605l5.887 8.535z"/><path fill="%logo_color%" d="M18.248 8.95l-1.846.24v-.004c-.244.04-.514.113-.8.214h-.01c-2.726.944-4.46 2.964-5.784 5.454l-.68-1.004c.604-.86 2.52-5.224 8.484-5.94.27.258.415.692.636 1.04z"/></svg>
 </span>
</a>',

        'instagram' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-instagram"></span></a>',

        'kakao' => '<a href=":url" class="social-button:class":id:title:rel>
<span class="" style="background-color:#fcb700;
width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box">
<svg style="display:block;border-radius:999px;" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 32 32"><path fill="#fff" d="M20.345 6h-8.688c-.583 0-1.06.45-1.06 1.005v8.814c0 .553.477 1.003 1.06 1.003h4.007c-.03.98-.445 2.056-1.077 2.996-.612.904-1.613 1.796-2.156 2.223l-.04.032c-.117.107-.202.23-.204.405-.003.13.07.232.15.34l.018.022 2.774 2.975s.137.137.247.163c.126.03.27.032.368-.042 4.84-3.56 5.537-8.023 5.66-10.44V7.004C21.403 6.45 20.93 6 20.346 6"></path></svg></span></a>',

        'mastodon' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-mastodon"></span></a>',
        'mix' => '<a href=":url" class="social-button:class":id:title:rel>
<span class=""
 style="background-color:#ff8226;
 width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box">
 <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="-7 -8 45 45"><g fill="%logo_color%"><path opacity=".8" d="M27.87 4.125c-5.224 0-9.467 4.159-9.467 9.291v2.89c0-1.306 1.074-2.362 2.399-2.362s2.399 1.056 2.399 2.362v1.204c0 1.306 1.074 2.362 2.399 2.362s2.399-1.056 2.399-2.362V4.134c-.036-.009-.082-.009-.129-.009"/><path d="M4 4.125v12.94c2.566 0 4.668-1.973 4.807-4.465v-2.214c0-.065 0-.12.009-.176.093-1.213 1.13-2.177 2.39-2.177 1.325 0 2.399 1.056 2.399 2.362v9.226c0 1.306 1.074 2.353 2.399 2.353s2.399-1.056 2.399-2.353v-6.206c0-5.132 4.233-9.291 9.467-9.291H4z"/><path opacity=".8" d="M4 17.074v8.438c0 1.306 1.074 2.362 2.399 2.362s2.399-1.056 2.399-2.362V12.61C8.659 15.102 6.566 17.074 4 17.074"/></g></svg>
 </span>
</a>',
        'mailto' => '<a href=":url" class="social-button:class":id:title:rel><span class="fas fa-envelope"></span></a>',

        'pinterest' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-pinterest"></span></a>',
        'pocket' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-get-pocket"></span></a>',

        'reddit' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-reddit"></span></a>',

        'skype' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-skype"></span></a>',

        'telegram' => '<a href=":url" class="social-button:class":id:title:rel target="_blank"><span class="fab fa-telegram"></span></a>',
        'twitter' => '<a href=":url" class="social-button:class":id:title:rel>
<span class=""
 style="background-color:#2a2a2a;
 width:25px;height:25px;
border-radius:999px;
display:inline-block;
opacity:1;
font-size:32px;
box-shadow:none;
display:inline-block;
font-size:16px;
padding:0 0px;
background-repeat:repeat;
overflow:hidden;
cursor:pointer;
box-sizing:content-box
 ">
 <svg width="100%" height="100%" style="%inner_style%" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="%logo_color%" d="M21.751 7h3.067l-6.7 7.658L26 25.078h-6.172l-4.833-6.32-5.531 6.32h-3.07l7.167-8.19L6 7h6.328l4.37 5.777L21.75 7Zm-1.076 16.242h1.7L11.404 8.74H9.58l11.094 14.503Z"></path></svg>
 </span>
</a>',

        'vkontakte' => '<a href=":url" class="social-button:class":id:title:rel><span class="fab fa-vk"></span></a>',
        'whatsapp' => '<a href=":url" class="social-button:class":id:title:rel target="_blank"><span class="fab fa-square-whatsapp"></span></a>',

        'xing' => '<a href=":url" class="social-button:class":id:title:rel target="_blank"><span class="fab fa-square-xing"></span></a>',
    ],


    /*
    |--------------------------------------------------------------------------
    | Templaters
    |--------------------------------------------------------------------------
    |
    | This package uses a simple template engine to substitute values in different
    | configuration settings and templates. If you want to change the substitution
    | format, feel free to use your favorite template engine (in this case it is
    | recommended to introduce an adapter that conforms to the Templater interface).
    |
    */

    'templater' => \Kudashevs\ShareButtons\Templaters\LaravelTemplater::class,

    'url_templater' => \Kudashevs\ShareButtons\Templaters\LaravelTemplater::class,

];
