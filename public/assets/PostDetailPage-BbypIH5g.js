import{E as f,u as g,e as m,f as u,r as d,a,j as r,c as n,G as h,C as p,I as i,H as y,F as x,L as b,l as k}from"./index-DkTcay3F.js";import{B as v}from"./BlogSection-CBOd7n1Y.js";import{P as E}from"./PageMeta-DmPFkgKF.js";import{I as w}from"./Image-DU9LAInX.js";import"./PrimaryButton-DIU5uI2w.js";import"./Card-BlmdRcri.js";function T(){const{slug:c}=f(),t=g(`${m}/api/post/${c}`,u),l=g(`${m}/api/post?page=1&limit=6`,u);return d.useEffect(()=>{(async()=>await t.mutate())()},[c]),d.useEffect(()=>{if(!t.data)return;document.querySelectorAll("figure.image-style-block-align-left, figure.image-style-block-align-right").forEach(o=>{const s=document.createElement("div");s.style.display="block",s.style.clear="both",o.insertAdjacentElement("afterend",s)})},[t.data]),t.isLoading||l.isLoading?a(b,{}):t.error||l.error?a(k,{}):r(x,{children:[a(E,{title:t.data.data.title,description:t.data.data.highlight,ogImage:t.data.data.cover}),a(h,{styles:n`
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
        `}),a("main",{children:r(p,{as:"article",css:n`
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
              `})]}),a("hr",{}),a("main",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:a(y,{html:t.data.data.content})}),a("hr",{}),a(v,{posts:l.data.data,header:a("h1",{className:"text-center",style:{marginBottom:"18px"},children:"CHECK OUT OUR OTHER POSTS!"})}),a("br",{})]})})]})}export{T as default};
