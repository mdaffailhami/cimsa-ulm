import{E as f,u as g,e as m,f as u,r as d,a,j as r,c as n,G as p,C as h,I as s,H as y,F as b,L as x,l as k}from"./index-DCLDiFRd.js";import{B as v}from"./BlogSection--ZOAw97w.js";import{P as E}from"./PageMeta-DkugUJj4.js";import{I as w}from"./Image-B-EGQ7HO.js";import"./PrimaryButton-DYlDaI4X.js";import"./Card-DW0sDjW-.js";function S(){const{slug:c}=f(),t=g(`${m}/api/post/${c}`,u),l=g(`${m}/api/post?page=1&limit=6`,u);return d.useEffect(()=>{(async()=>await t.mutate())()},[c]),d.useEffect(()=>{if(!t.data)return;document.querySelectorAll("figure.image-style-block-align-left, figure.image-style-block-align-right").forEach(o=>{const i=document.createElement("div");i.style.display="block",i.style.clear="both",o.insertAdjacentElement("afterend",i)})},[t.data]),t.isLoading||l.isLoading?a(x,{}):t.error||l.error?a(k,{}):r(b,{children:[a(E,{title:t.data.data.title,description:t.data.data.highlight,ogImage:t.data.data.cover}),a(p,{styles:n`
          figure.image,
          figure.image img {
            display: block;
            margin: 0 auto;
          }

          figure.image-style-block-align-left {
            float: left;
          }

          figure.image-style-block-align-right {
            float: right;
          }

          /* Inline image */
          p img {
            vertical-align: bottom;
          }
        `}),a("main",{children:r(h,{as:"article",css:n`
            margin-top: 18px;
          `,children:[r("header",{children:[r("div",{"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",css:n`
                display: flex;
                justify-content: space-between;
                align-items: center;
              `,children:[a("h1",{style:{flexGrow:1},children:t.data.data.title}),r(s,{onMouseEnter:e=>{e.target.classList.contains("show")||e.target.click()},onMouseLeave:e=>{e.target.classList.contains("show")&&e.target.click()},children:[a(s.Toggle,{variant:"secondary",size:"sm",children:"Categories"}),a(s.Menu,{as:"ul",style:{padding:0,width:"auto"},children:t.data.data.categories.map((e,o)=>r(d.Fragment,{children:[o!=0&&a(s.Divider,{style:{margin:0}}),a(s.Item,{as:"li",style:{textAlign:"center",padding:0},onMouseOver:i=>{i.target.style.backgroundColor="transparent"},onMouseOut:i=>{i.target.style.backgroundColor="unset"},children:e})]},o))})]})]}),a(w,{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",src:t.data.data.cover,css:n`
                position: relative;
                max-width: 800px;
                width: 100%;
                display: block;
                margin: 10px auto;
                z-index: -1;
              `})]}),a("hr",{}),a("main",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:a(y,{html:t.data.data.content})}),a("hr",{}),a(v,{posts:l.data.data,header:a("h1",{className:"text-center",style:{marginBottom:"18px"},children:"CHECK OUT OUR OTHER POSTS!"})}),a("br",{})]})})]})}export{S as default};
