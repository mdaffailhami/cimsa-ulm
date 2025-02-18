import{r as T,j as g,a as o,c as h,C as J,d as pt,h as gt,i as bt,k as yt,R as Z,b as _,u as at,e as rt,f as ot,H as nt,F as vt,l as xt,L as wt}from"./index-BEyJHjE1.js";import{P as St}from"./PrimaryButton-DxR9xqOZ.js";import{B as Et}from"./BlogSection-BamfLLW_.js";import{C as N}from"./Card-D7rehrTn.js";import{I as Vt}from"./Image-CZAby9Cn.js";import{P as Ot}from"./PageMeta-CdVBd3kD.js";function Ct({about:r,bgImage:i}){const[s,u]=T.useReducer(e=>e+1,0);return T.useEffect(()=>{const e=()=>u();return window.addEventListener("resize",e),()=>{window.removeEventListener("resize",e)}},[]),T.useEffect(()=>{const e=document.getElementById("about-us-section-text"),f=document.getElementById("about-us-section-banner"),d=e.clientHeight;f.style.height=`${d+100}px`},[s]),g("div",{style:{position:"relative"},children:[o("div",{id:"about-us-section-banner",css:h`
          background-image: url('${i}');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
          width: 100%;
          height: 800px;
          filter: brightness(65%);
          background-attachment: fixed;
        `}),g(J,{id:"about-us-section-text",style:{position:"absolute",top:"50%",left:"50%",transform:"translate(-50%, -50%)",background:"white",display:"flex",flexDirection:"column",justifyContent:"center",alignItems:"center",borderRadius:"15px",color:"black",textAlign:"center"},css:h`
          width: 86%;
          padding: 10%;

          @media (min-width: 992px) {
            width: 54%;
            padding: 4%;
            padding-left: 10%;
            padding-right: 10%;
          }

          @media (min-width: 2000px) {
            padding: 4%;
            padding-left: 200px;
            padding-right: 200px;
          }
        `,"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",children:[o("h2",{css:h`
            color: red;
            font-weight: bold;
            font-size: 32px;

            @media (min-width: 992px) {
              font-size: 44px;
            }
          `,"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",children:"About Us"}),o("p",{"data-aos":"zoom-in-down","data-aos-once":"true","data-aos-duration":"1200",children:r}),o("br",{}),o(St,{to:"/about-us",children:"Learn More"})]})]})}function jt({title:r,image:i}){const s=T.useContext(pt);return g("div",{css:h`
        position: relative;
        height: 800px;
      `,children:[o("div",{css:h`
          background: linear-gradient(
              to bottom,
              transparent,
              rgba(255, 0, 0, 0.15)
            ),
            url(${i});
          /* url('https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'); */
          background-size: cover;
          background-position: center;
          width: 100%;
          height: 100%;
          filter: brightness(70%);
        `}),g(J,{css:h`
          padding-left: 10%;
          padding-right: 10%;
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          color: white;
          text-align: center;
        `,children:[o("h1",{id:"banner-title","data-aos":"fade-down","data-aos-duration":"2500",css:h`
            font-weight: 600;
            font-size: 36px;

            @media (min-width: 992px) {
              font-size: 52px;
            }
          `,children:r}),o("br",{}),(()=>{const u=({children:e})=>o("h2",{className:"lead","data-aos":"fade-up","data-aos-duration":"1200",css:h`
                font-size: 16px;

                @media (min-width: 992px) {
                  font-size: 26px;
                }
              `,children:e});return s?o(u,{children:s.profile.find(e=>e.column=="universitas").text_content.toUpperCase()}):o(u,{children:" "})})(),o("hr",{style:{border:"2px solid red",width:"200px"},"data-aos":"zoom-in","data-aos-duration":"2000"})]})]})}var W={},tt=function(){return tt=Object.assign||function(r){for(var i,s=1,u=arguments.length;s<u;s++)for(var e in i=arguments[s])Object.prototype.hasOwnProperty.call(i,e)&&(r[e]=i[e]);return r},tt.apply(this,arguments)},Rt=function(){function r(i,s,u){var e=this;this.endVal=s,this.options=u,this.version="2.8.0",this.defaults={startVal:0,decimalPlaces:0,duration:2,useEasing:!0,useGrouping:!0,useIndianSeparators:!1,smartEasingThreshold:999,smartEasingAmount:333,separator:",",decimal:".",prefix:"",suffix:"",enableScrollSpy:!1,scrollSpyDelay:200,scrollSpyOnce:!1},this.finalEndVal=null,this.useEasing=!0,this.countDown=!1,this.error="",this.startVal=0,this.paused=!0,this.once=!1,this.count=function(f){e.startTime||(e.startTime=f);var d=f-e.startTime;e.remaining=e.duration-d,e.useEasing?e.countDown?e.frameVal=e.startVal-e.easingFn(d,0,e.startVal-e.endVal,e.duration):e.frameVal=e.easingFn(d,e.startVal,e.endVal-e.startVal,e.duration):e.frameVal=e.startVal+(e.endVal-e.startVal)*(d/e.duration);var p=e.countDown?e.frameVal<e.endVal:e.frameVal>e.endVal;e.frameVal=p?e.endVal:e.frameVal,e.frameVal=Number(e.frameVal.toFixed(e.options.decimalPlaces)),e.printValue(e.frameVal),d<e.duration?e.rAF=requestAnimationFrame(e.count):e.finalEndVal!==null?e.update(e.finalEndVal):e.options.onCompleteCallback&&e.options.onCompleteCallback()},this.formatNumber=function(f){var d,p,x,V,D=f<0?"-":"";d=Math.abs(f).toFixed(e.options.decimalPlaces);var z=(d+="").split(".");if(p=z[0],x=z.length>1?e.options.decimal+z[1]:"",e.options.useGrouping){V="";for(var K=3,q=0,A=0,Q=p.length;A<Q;++A)e.options.useIndianSeparators&&A===4&&(K=2,q=1),A!==0&&q%K==0&&(V=e.options.separator+V),q++,V=p[Q-A-1]+V;p=V}return e.options.numerals&&e.options.numerals.length&&(p=p.replace(/[0-9]/g,function($){return e.options.numerals[+$]}),x=x.replace(/[0-9]/g,function($){return e.options.numerals[+$]})),D+e.options.prefix+p+x+e.options.suffix},this.easeOutExpo=function(f,d,p,x){return p*(1-Math.pow(2,-10*f/x))*1024/1023+d},this.options=tt(tt({},this.defaults),u),this.formattingFn=this.options.formattingFn?this.options.formattingFn:this.formatNumber,this.easingFn=this.options.easingFn?this.options.easingFn:this.easeOutExpo,this.startVal=this.validateValue(this.options.startVal),this.frameVal=this.startVal,this.endVal=this.validateValue(s),this.options.decimalPlaces=Math.max(this.options.decimalPlaces),this.resetDuration(),this.options.separator=String(this.options.separator),this.useEasing=this.options.useEasing,this.options.separator===""&&(this.options.useGrouping=!1),this.el=typeof i=="string"?document.getElementById(i):i,this.el?this.printValue(this.startVal):this.error="[CountUp] target is null or undefined",typeof window<"u"&&this.options.enableScrollSpy&&(this.error?console.error(this.error,i):(window.onScrollFns=window.onScrollFns||[],window.onScrollFns.push(function(){return e.handleScroll(e)}),window.onscroll=function(){window.onScrollFns.forEach(function(f){return f()})},this.handleScroll(this)))}return r.prototype.handleScroll=function(i){if(i&&window&&!i.once){var s=window.innerHeight+window.scrollY,u=i.el.getBoundingClientRect(),e=u.top+window.pageYOffset,f=u.top+u.height+window.pageYOffset;f<s&&f>window.scrollY&&i.paused?(i.paused=!1,setTimeout(function(){return i.start()},i.options.scrollSpyDelay),i.options.scrollSpyOnce&&(i.once=!0)):(window.scrollY>f||e>s)&&!i.paused&&i.reset()}},r.prototype.determineDirectionAndSmartEasing=function(){var i=this.finalEndVal?this.finalEndVal:this.endVal;this.countDown=this.startVal>i;var s=i-this.startVal;if(Math.abs(s)>this.options.smartEasingThreshold&&this.options.useEasing){this.finalEndVal=i;var u=this.countDown?1:-1;this.endVal=i+u*this.options.smartEasingAmount,this.duration=this.duration/2}else this.endVal=i,this.finalEndVal=null;this.finalEndVal!==null?this.useEasing=!1:this.useEasing=this.options.useEasing},r.prototype.start=function(i){this.error||(this.options.onStartCallback&&this.options.onStartCallback(),i&&(this.options.onCompleteCallback=i),this.duration>0?(this.determineDirectionAndSmartEasing(),this.paused=!1,this.rAF=requestAnimationFrame(this.count)):this.printValue(this.endVal))},r.prototype.pauseResume=function(){this.paused?(this.startTime=null,this.duration=this.remaining,this.startVal=this.frameVal,this.determineDirectionAndSmartEasing(),this.rAF=requestAnimationFrame(this.count)):cancelAnimationFrame(this.rAF),this.paused=!this.paused},r.prototype.reset=function(){cancelAnimationFrame(this.rAF),this.paused=!0,this.resetDuration(),this.startVal=this.validateValue(this.options.startVal),this.frameVal=this.startVal,this.printValue(this.startVal)},r.prototype.update=function(i){cancelAnimationFrame(this.rAF),this.startTime=null,this.endVal=this.validateValue(i),this.endVal!==this.frameVal&&(this.startVal=this.frameVal,this.finalEndVal==null&&this.resetDuration(),this.finalEndVal=null,this.determineDirectionAndSmartEasing(),this.rAF=requestAnimationFrame(this.count))},r.prototype.printValue=function(i){var s;if(this.el){var u=this.formattingFn(i);!((s=this.options.plugin)===null||s===void 0)&&s.render?this.options.plugin.render(this.el,u):this.el.tagName==="INPUT"?this.el.value=u:this.el.tagName==="text"||this.el.tagName==="tspan"?this.el.textContent=u:this.el.innerHTML=u}},r.prototype.ensureNumber=function(i){return typeof i=="number"&&!isNaN(i)},r.prototype.validateValue=function(i){var s=Number(i);return this.ensureNumber(s)?s:(this.error="[CountUp] invalid start or end value: ".concat(i),null)},r.prototype.resetDuration=function(){this.startTime=null,this.duration=1e3*Number(this.options.duration),this.remaining=this.duration},r}();const Pt=Object.freeze(Object.defineProperty({__proto__:null,CountUp:Rt},Symbol.toStringTag,{value:"Module"})),Ft=gt(Pt);var st;function Nt(){if(st)return W;st=1,Object.defineProperty(W,"__esModule",{value:!0});var r=bt(),i=Ft;function s(a,t){var n=a==null?null:typeof Symbol<"u"&&a[Symbol.iterator]||a["@@iterator"];if(n!=null){var l,c,m,O,w=[],b=!0,y=!1;try{if(m=(n=n.call(a)).next,t!==0)for(;!(b=(l=m.call(n)).done)&&(w.push(l.value),w.length!==t);b=!0);}catch(v){y=!0,c=v}finally{try{if(!b&&n.return!=null&&(O=n.return(),Object(O)!==O))return}finally{if(y)throw c}}return w}}function u(a,t){var n=Object.keys(a);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(a);t&&(l=l.filter(function(c){return Object.getOwnPropertyDescriptor(a,c).enumerable})),n.push.apply(n,l)}return n}function e(a){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?u(Object(n),!0).forEach(function(l){p(a,l,n[l])}):Object.getOwnPropertyDescriptors?Object.defineProperties(a,Object.getOwnPropertyDescriptors(n)):u(Object(n)).forEach(function(l){Object.defineProperty(a,l,Object.getOwnPropertyDescriptor(n,l))})}return a}function f(a,t){if(typeof a!="object"||!a)return a;var n=a[Symbol.toPrimitive];if(n!==void 0){var l=n.call(a,t||"default");if(typeof l!="object")return l;throw new TypeError("@@toPrimitive must return a primitive value.")}return(t==="string"?String:Number)(a)}function d(a){var t=f(a,"string");return typeof t=="symbol"?t:String(t)}function p(a,t,n){return t=d(t),t in a?Object.defineProperty(a,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):a[t]=n,a}function x(){return x=Object.assign?Object.assign.bind():function(a){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var l in n)Object.prototype.hasOwnProperty.call(n,l)&&(a[l]=n[l])}return a},x.apply(this,arguments)}function V(a,t){if(a==null)return{};var n={},l=Object.keys(a),c,m;for(m=0;m<l.length;m++)c=l[m],!(t.indexOf(c)>=0)&&(n[c]=a[c]);return n}function D(a,t){if(a==null)return{};var n=V(a,t),l,c;if(Object.getOwnPropertySymbols){var m=Object.getOwnPropertySymbols(a);for(c=0;c<m.length;c++)l=m[c],!(t.indexOf(l)>=0)&&Object.prototype.propertyIsEnumerable.call(a,l)&&(n[l]=a[l])}return n}function z(a,t){return K(a)||s(a,t)||q(a,t)||Q()}function K(a){if(Array.isArray(a))return a}function q(a,t){if(a){if(typeof a=="string")return A(a,t);var n=Object.prototype.toString.call(a).slice(8,-1);if(n==="Object"&&a.constructor&&(n=a.constructor.name),n==="Map"||n==="Set")return Array.from(a);if(n==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return A(a,t)}}function A(a,t){(t==null||t>a.length)&&(t=a.length);for(var n=0,l=new Array(t);n<t;n++)l[n]=a[n];return l}function Q(){throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}var $=typeof window<"u"&&typeof window.document<"u"&&typeof window.document.createElement<"u"?r.useLayoutEffect:r.useEffect;function S(a){var t=r.useRef(a);return $(function(){t.current=a}),r.useCallback(function(){for(var n=arguments.length,l=new Array(n),c=0;c<n;c++)l[c]=arguments[c];return t.current.apply(void 0,l)},[])}var ct=function(t,n){var l=n.decimal,c=n.decimals,m=n.duration,O=n.easingFn,w=n.end,b=n.formattingFn,y=n.numerals,v=n.prefix,I=n.separator,U=n.start,M=n.suffix,k=n.useEasing,R=n.useGrouping,C=n.useIndianSeparators,B=n.enableScrollSpy,E=n.scrollSpyDelay,L=n.scrollSpyOnce,P=n.plugin;return new i.CountUp(t,w,{startVal:U,duration:m,decimal:l,decimalPlaces:c,easingFn:O,formattingFn:b,numerals:y,separator:I,prefix:v,suffix:M,plugin:P,useEasing:k,useIndianSeparators:C,useGrouping:R,enableScrollSpy:B,scrollSpyDelay:E,scrollSpyOnce:L})},dt=["ref","startOnMount","enableReinitialize","delay","onEnd","onStart","onPauseResume","onReset","onUpdate"],ft={decimal:".",separator:",",delay:null,prefix:"",suffix:"",duration:2,start:0,decimals:0,startOnMount:!0,enableReinitialize:!0,useEasing:!0,useGrouping:!0,useIndianSeparators:!1},it=function(t){var n=Object.fromEntries(Object.entries(t).filter(function(j){var Y=z(j,2),X=Y[1];return X!==void 0})),l=r.useMemo(function(){return e(e({},ft),n)},[t]),c=l.ref,m=l.startOnMount,O=l.enableReinitialize,w=l.delay,b=l.onEnd,y=l.onStart,v=l.onPauseResume,I=l.onReset,U=l.onUpdate,M=D(l,dt),k=r.useRef(),R=r.useRef(),C=r.useRef(!1),B=S(function(){return ct(typeof c=="string"?c:c.current,M)}),E=S(function(j){var Y=k.current;if(Y&&!j)return Y;var X=B();return k.current=X,X}),L=S(function(){var j=function(){return E(!0).start(function(){b==null||b({pauseResume:P,reset:F,start:G,update:H})})};w&&w>0?R.current=setTimeout(j,w*1e3):j(),y==null||y({pauseResume:P,reset:F,update:H})}),P=S(function(){E().pauseResume(),v==null||v({reset:F,start:G,update:H})}),F=S(function(){E().el&&(R.current&&clearTimeout(R.current),E().reset(),I==null||I({pauseResume:P,start:G,update:H}))}),H=S(function(j){E().update(j),U==null||U({pauseResume:P,reset:F,start:G})}),G=S(function(){F(),L()}),et=S(function(j){m&&(j&&F(),L())});return r.useEffect(function(){C.current?O&&et(!0):(C.current=!0,et())},[O,C,et,w,t.start,t.suffix,t.prefix,t.duration,t.separator,t.decimals,t.decimal,t.formattingFn]),r.useEffect(function(){return function(){F()}},[F]),{start:G,pauseResume:P,reset:F,update:H,getCountUp:E}},mt=["className","redraw","containerProps","children","style"],ht=function(t){var n=t.className,l=t.redraw,c=t.containerProps,m=t.children,O=t.style,w=D(t,mt),b=r.useRef(null),y=r.useRef(!1),v=it(e(e({},w),{},{ref:b,startOnMount:typeof m!="function"||t.delay===0,enableReinitialize:!1})),I=v.start,U=v.reset,M=v.update,k=v.pauseResume,R=v.getCountUp,C=S(function(){I()}),B=S(function(P){t.preserveValue||U(),M(P)}),E=S(function(){if(typeof t.children=="function"&&!(b.current instanceof Element)){console.error(`Couldn't find attached element to hook the CountUp instance into! Try to attach "containerRef" from the render prop to a an Element, eg. <span ref={containerRef} />.`);return}R()});r.useEffect(function(){E()},[E]),r.useEffect(function(){y.current&&B(t.end)},[t.end,B]);var L=l&&t;return r.useEffect(function(){l&&y.current&&C()},[C,l,L]),r.useEffect(function(){!l&&y.current&&C()},[C,l,t.start,t.suffix,t.prefix,t.duration,t.separator,t.decimals,t.decimal,t.className,t.formattingFn]),r.useEffect(function(){y.current=!0},[]),typeof m=="function"?m({countUpRef:b,start:I,reset:U,update:M,pauseResume:k,getCountUp:R}):r.createElement("span",x({className:n,ref:b,style:O},c),typeof t.start<"u"?R().formattingFn(t.start):"")};return W.default=ht,W.useCountUp=it,W}var At=Nt();const It=yt(At);function Ut({statistics:r}){return o(J,{className:"d-flex flex-wrap justify-content-center","data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",children:o(Z,{xs:2,sm:2,md:4,lg:4,className:"g-5 flex justify-content-center",children:r.map((i,s)=>o(_,{children:o(zt,{title:i.label,content:i.value})},s))})})}function zt({title:r,content:i}){return o(N,{style:{border:"none"},children:g(N.Body,{children:[o(N.Title,{className:"text-center",children:o(It,{enableScrollSpy:!0,scrollSpyOnce:!0,start:0,duration:4,separator:"",decimals:0,decimal:",",suffix:"",prefix:isNaN(i[0])?i[0]:"",end:isNaN(i[0])?i.slice(1):i,children:({countUpRef:s})=>o("span",{ref:s,css:h`
                  font-weight: 600;
                  color: #2d2d2d;
                  font-size: 36px;

                  @media (min-width: 992px) {
                    font-size: 50px;
                  }
                `})})}),o(N.Subtitle,{className:"text-center",children:r})]})})}function _t({quote:r,author:i,image:s}){return g("div",{style:{background:"#2d2d2d",paddingTop:"17.5px",paddingBottom:"10px",color:"white"},children:[o(J,{css:h`
          @media (max-width: 575.99px) {
            padding-left: 19px;
            padding-right: 19px;
          }
        `,children:g(Z,{xs:1,sm:1,md:1,lg:2,children:[o(_,{children:o("center",{children:o("img",{src:s,width:600,alt:`Quote by ${i}`,css:h`
                  height: 300px;
                  border-radius: 10px;
                  object-fit: cover;

                  @media (min-width: 768px) {
                    height: 360px;
                  }
                `,"data-aos":"flip-right","data-aos-duration":"1200","data-aos-once":"true"})})}),o(_,{children:g("blockquote",{className:"blockquote d-flex flex-column justify-content-center",style:{height:"100%"},children:[g("h2",{css:h`
                  font-weight: normal;
                  font-style: italic;
                  font-size: 26px;

                  @media (min-width: 992px) {
                    font-size: 31px;
                  }
                `,"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",children:["❝ ",r," ❞"]}),o("footer",{className:"blockquote-footer",css:h`
                  text-align: right;
                  margin-top: 0;
                  margin-right: 40px;
                  font-size: 22px;

                  @media (min-width: 992px) {
                    font-size: 26px;
                  }
                `,children:i})]})})]})}),o("hr",{})]})}function Tt({vision:r,visionImage:i,mission:s,missionImage:u}){const[e,f]=T.useReducer(d=>d+1,0);return T.useEffect(()=>{const d=()=>f();return window.addEventListener("resize",d),()=>{window.removeEventListener("resize",d)}},[]),T.useEffect(()=>{const d=document.getElementById("vision-text"),p=document.getElementById("vision-image"),x=document.getElementById("mission-text"),V=document.getElementById("mission-image"),D=d.clientHeight,z=x.clientHeight;p.style.height=`${D}px`,V.style.height=`${z}px`},[e]),g(J,{className:"d-flex flex-wrap justify-content-center",children:[g(Z,{xs:1,sm:1,md:2,children:[o(_,{className:"d-flex justify-content-center",children:o(lt,{id:"vision-image",alt:"CIMSA Vision",image:i,aos:"flip-right"})}),o(_,{className:"d-flex align-items-center justify-content-center",children:o(ut,{id:"vision-text",title:"Our Vision",body:r,aos:"fade-left"})})]}),g(Z,{xs:1,sm:1,md:2,className:"mt-4",children:[o(_,{className:"d-flex align-items-center justify-content-center",children:o(ut,{id:"mission-text",title:"Our Mission",body:s,aos:"fade-right"})}),o(_,{className:"d-flex justify-content-center",children:o(lt,{id:"mission-image",alt:"CIMSA Mission",image:u,aos:"flip-left"})})]})]})}function lt({id:r,image:i,aos:s,alt:u}){return o(N,{id:r,"data-aos":s,"data-aos-once":"true","data-aos-duration":"1200",css:h`
        background-color: red;
        border: none;
        overflow: hidden;
        width: 100%;
        height: 220px;

        @media (min-width: 992px) {
          width: 500px;
          height: 280px;
        }
      `,children:o(Vt,{src:i,alt:u,css:h`
          width: 100%;
          height: 100%;
          object-fit: cover;
        `})})}function ut({id:r,title:i,body:s,aos:u}){return o(N,{id:r,className:"shadow text-center","data-aos":u,"data-aos-once":"true","data-aos-duration":"1200",css:h`
        width: 100%;

        @media (min-width: 992px) {
          width: 500px;
        }
      `,children:g(N.Body,{children:[o(N.Title,{css:h`
            color: red;
            font-weight: bold;
            font-size: 23px;

            @media (min-width: 992px) {
              font-size: 26px;
            }
          `,children:i}),o(N.Text,{css:h`
            @media (min-width: 992px) {
              font-size: 18px;
            }
          `,children:s})]})})}function $t(){const r=at(`${rt}/api/page/landing`,ot),i=at(`${rt}/api/post?page=1&limit=6`,ot);return r.error||i.error?o(xt,{}):r.isLoading||i.isLoading?o(wt,{}):g(vt,{children:[o(Ot,{title:"CIMSA ULM",description:"CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit and non-governmental organization, that centers on the Sustainable Development Goals."}),g("main",{children:[o(jt,{title:r.data.contents.find(s=>s.column==="banner-title").text_content,image:r.data.contents.find(s=>s.column==="banner-image").galleries[0].url}),o("br",{}),o(Tt,{vision:o(nt,{html:r.data.contents.find(s=>s.column==="vision").long_text_content}),visionImage:r.data.contents.find(s=>s.column==="vision-image").galleries[0].url,mission:o(nt,{html:r.data.contents.find(s=>s.column==="mission").long_text_content}),missionImage:r.data.contents.find(s=>s.column==="mission-image").galleries[0].url}),o("br",{}),o("hr",{}),o(Ut,{statistics:JSON.parse(r.data.contents.find(s=>s.column==="statistics").multiple_value_content)}),o("hr",{}),o("br",{}),o(Ct,{about:o(nt,{html:r.data.contents.find(s=>s.column==="about-us").long_text_content}),bgImage:r.data.contents.find(s=>s.column==="about-us-bg-image").galleries[0].url}),o("br",{}),o("hr",{}),o("br",{}),o(Et,{posts:i.data.data}),o("br",{}),o("hr",{}),o("br",{}),o(_t,{quote:r.data.contents.find(s=>s.column==="quote").text_content,author:r.data.contents.find(s=>s.column==="quote-author").text_content,image:r.data.contents.find(s=>s.column==="quote-image").galleries[0].url})]})]})}export{$t as default};
