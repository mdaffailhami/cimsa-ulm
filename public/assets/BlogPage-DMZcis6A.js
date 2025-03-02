import{r as m,o as w,m as p,n as h,A as _,j as d,a as i,c as g,G as v,B as A,F as x,D as S,u as k,e as N,f as $,L as j,l as C,C as R,H as M}from"./index-CdoKCSUK.js";import{P as G}from"./PageHeader-CQL2Q7Mw.js";import{B as H}from"./BlogSection-D0hBo0Ia.js";import{S as O}from"./SocmedsSection-KtzKmUEq.js";import{C as z}from"./ContactCardSection-NwQS0D8g.js";import{P as W}from"./PageMeta-D59WkTr3.js";import"./PrimaryButton-aJuwTzJ4.js";import"./Card-BrVf6z4T.js";import"./Image-Bv3cQMHz.js";const B=m.forwardRef(({bsPrefix:a,bg:o="primary",pill:e=!1,text:r,className:s,as:t="span",...c},f)=>{const n=w(a,"badge");return p.jsx(t,{ref:f,...c,className:h(s,n,e&&"rounded-pill",r&&`text-${r}`,o&&`bg-${o}`)})});B.displayName="Badge";const b=m.forwardRef(({active:a=!1,disabled:o=!1,className:e,style:r,activeLabel:s="(current)",children:t,linkStyle:c,linkClassName:f,as:n=_,...E},L)=>{const F=a||o?"span":n;return p.jsx("li",{ref:L,style:r,className:h(e,"page-item",{active:a,disabled:o}),children:p.jsxs(F,{className:h("page-link",f),style:c,...E,children:[t,a&&s&&p.jsx("span",{className:"visually-hidden",children:s})]})})});b.displayName="PageItem";function u(a,o,e=a){const r=m.forwardRef(({children:s,...t},c)=>p.jsxs(b,{...t,ref:c,children:[p.jsx("span",{"aria-hidden":"true",children:s||o}),p.jsx("span",{className:"visually-hidden",children:e})]}));return r.displayName=a,r}const D=u("First","«"),J=u("Prev","‹","Previous"),U=u("Ellipsis","…","More"),q=u("Next","›"),K=u("Last","»"),I=m.forwardRef(({bsPrefix:a,className:o,size:e,...r},s)=>{const t=w(a,"pagination");return p.jsx("ul",{ref:s,...r,className:h(o,t,e&&`${t}-${e}`)})});I.displayName="Pagination";const l=Object.assign(I,{First:D,Prev:J,Ellipsis:U,Item:b,Next:q,Last:K});function y({category:a,active:o,to:e,onClick:r}){return d(x,{children:[i(v,{styles:g`
          .filter-chip {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: red !important;
            border: 1px solid red !important;
          }

          .filter-chip-active {
            background-color: red !important;
            color: white !important;
            border: 1px solid red !important;
          }
        `}),i(B,{className:`${o?"filter-chip-active":"filter-chip"}`,as:A,onClick:r,css:g`
          padding: 8px 16px;
          font-weight: normal;
          font-size: 18px;
        `,children:a})]})}function P({activePage:a,totalPage:o,onPageChange:e}){return d(x,{children:[i(v,{styles:g`
          .pagination > li > a {
            background-color: white;
            color: red;
          }

          .pagination > li > a:focus,
          .pagination > li > a:hover,
          .pagination > li > span:focus,
          .pagination > li > span:hover {
            color: red;
            outline: none;
            box-shadow: none;
          }

          .pagination > .active > a,
          .pagination > .active > .page-link {
            color: white;
            background-color: red !important;
            border: solid 1px red !important;
          }

          .pagination > .active > a:hover {
            background-color: red !important;
            border: solid 1px red;
          }
        `}),d(l,{css:g`
          display: flex;
          justify-content: center;
        `,children:[i(l.Prev,{onClick:()=>e(a-1)},"prev"),(()=>{let s=[];if(a<3)for(let t=1;t<=o;t++)if(t>3){s.push(i(l.Ellipsis,{},"ellipsis-end")),s.push(i(l.Item,{active:a==o,onClick:()=>e(o),children:o},o));break}else s.push(i(l.Item,{active:a==t,onClick:()=>e(t),children:t},t));else{s.push(i(l.Item,{active:a==1,onClick:()=>e(1),children:"1"},1)),s.push(i(l.Ellipsis,{},"ellipsis-start"));for(let t=a-1;t<=o;t++)if(t>a+1){s.push(i(l.Ellipsis,{},"ellipsis-end")),s.push(i(l.Item,{active:a==o,onClick:()=>e(o),children:o},o));break}else s.push(i(l.Item,{active:a==t,onClick:()=>e(t),children:t},t))}return s})(),i(l.Next,{onClick:()=>e(a+1)},"next")]})]})}function Q(){const a=S(),[o,e]=m.useState({category:a[1],page:parseInt(a[2])}),{category:r,page:s}=o,t=k(`${N}/api/post?page=${s}&limit=9&category=${r=="all"?"":r}`,$),c=n=>{window.history.replaceState({},"",`/blog/${n}/1`),e({category:n,page:1})},f=n=>{if(!t.data)throw new Error("Failed to navigate!");n=parseInt(n),n<1&&(n=1),n>t.data.pagination.last_page&&(n=t.data.pagination.last_page),window.history.replaceState({},"",`/blog/${r}/${n}`),e({...o,page:n})};return m.useEffect(()=>{(async()=>(await t.mutate(),t.data&&t.data.pagination.last_page<s&&f(t.data.pagination.last_page)))()},[o]),t.isLoading?i(j,{}):t.error?i(C,{}):d(x,{children:[i("div",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",children:i("hr",{})}),d("section",{className:"d-flex justify-content-center align-items-center",style:{display:"flex",justifyContent:"center",gap:"12px"},children:[i(y,{category:"All",active:r=="all",onClick:()=>{c("all")}}),i(y,{category:"Articles",active:r=="articles",onClick:()=>{c("articles")}}),i(y,{category:"Activities",active:r=="activities",onClick:()=>{c("activities")}})]}),i("section",{children:i(H,{aos:null,header:i("br",{}),posts:t.data.data,footer:i(P,{activePage:s,totalPage:t.data?t.data.pagination.last_page:1,onPageChange:n=>{window.history.replaceState({},"",`/blog/${r}/${n}`),f(n)}})})}),i("div",{"data-aos":"zoom-in","data-aos-duration":"1200","data-aos-once":"true",children:i("hr",{})})]})}function ot(){const a=S(),o=28;a.length!=3&&window.history.replaceState({},"","/blog/all/1"),a[1]!="all"&&a[1]!="articles"&&a[1]!="activities"&&window.history.replaceState({},"",`/blog/all/${a[2]}`),isNaN(parseInt(a[2]))&&window.history.replaceState({},"",`/blog/${a[1]}/1`),parseInt(a[2])<1&&window.history.replaceState({},"",`/blog/${a[1]}/1`);const e=k(`${N}/api/page/blog`,$);return e.isLoading?i(j,{}):e.error?i(C,{}):d(x,{children:[i(W,{title:"Blog - CIMSA ULM",description:"Content from our members, seniors, alumni, and activity reports."}),d("main",{children:[d(R,{children:[i(G,{title:"BLOG",description:i(M,{html:e.data.contents.find(r=>r.column==="description").long_text_content})}),i(Q,{totalPage:o})]}),i("br",{}),i(O,{}),i("br",{}),i(z,{period:e.data.contact.generation,position:e.data.contact.occupation,picture:e.data.contact.image,name:e.data.contact.name,email:e.data.contact.email,phone:e.data.contact.phone})]})]})}export{ot as default};
