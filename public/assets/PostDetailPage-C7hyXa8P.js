import{E as f,u as g,e as m,f as u,r as d,a,j as r,c as n,G as p,C as h,I as i,H as y,F as b,L as x,l as k}from"./index-DOx3K9Sw.js";import{B as v}from"./BlogSection-Ctw4qlzC.js";import{P as E}from"./PageMeta-gyFUgdqE.js";import{I as w}from"./Image-BVDg7mpA.js";import"./PrimaryButton-BYnwR4q9.js";import"./Card-CvZpgFWD.js";function S(){const{slug:c}=f(),t=g(`${m}/api/post/${c}`,u),l=g(`${m}/api/post?page=1&limit=6`,u);return d.useEffect(()=>{(async()=>await t.mutate())()},[c]),d.useEffect(()=>{if(!t.data)return;document.querySelectorAll("figure.image-style-block-align-left, figure.image-style-block-align-right").forEach(o=>{const s=document.createElement("div");s.style.display="block",s.style.clear="both",o.insertAdjacentElement("afterend",s)})},[t.data]),t.isLoading||l.isLoading?a(x,{}):t.error||l.error?a(k,{}):r(b,{children:[a(E,{title:t.data.data.title,description:t.data.data.highlight,ogImage:t.data.data.cover}),a(p,{styles:n`
          figure.image {
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
              `,children:[a("h1",{style:{flexGrow:1},children:t.data.data.title}),r(i,{onMouseEnter:e=>{e.target.classList.contains("show")||e.target.click()},onMouseLeave:e=>{e.target.classList.contains("show")&&e.target.click()},children:[a(i.Toggle,{variant:"secondary",size:"sm",children:"Categories"}),a(i.Menu,{as:"ul",style:{padding:0,width:"auto"},children:t.data.data.categories.map((e,o)=>r(d.Fragment,{children:[o!=0&&a(i.Divider,{style:{margin:0}}),a(i.Item,{as:"li",style:{textAlign:"center",padding:0},onMouseOver:s=>{s.target.style.backgroundColor="transparent"},onMouseOut:s=>{s.target.style.backgroundColor="unset"},children:e})]},o))})]})]}),a(w,{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",src:t.data.data.cover,css:n`
                position: relative;
                max-width: 800px;
                width: 100%;
                display: block;
                margin: 10px auto;
                z-index: -1;
              `})]}),a("hr",{}),a("main",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:a(y,{html:t.data.data.content})}),a("hr",{}),a(v,{posts:l.data.data,header:a("h1",{className:"text-center",style:{marginBottom:"18px"},children:"CHECK OUT OUR OTHER POSTS!"})}),a("br",{})]})})]})}export{S as default};
