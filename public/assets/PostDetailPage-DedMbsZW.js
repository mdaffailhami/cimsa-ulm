import{E as u,u as l,e as g,f as m,r as p,a,j as s,C as h,c as n,I as r,H as f,F as x,L as y,l as w}from"./index-BEyJHjE1.js";import{B as P}from"./BlogSection-BamfLLW_.js";import{P as v}from"./PageMeta-CdVBd3kD.js";import{I as L}from"./Image-CZAby9Cn.js";import"./PrimaryButton-DxR9xqOZ.js";import"./Card-D7rehrTn.js";function I(){const{slug:d}=u(),t=l(`${g}/api/post/${d}`,m),o=l(`${g}/api/post?page=1&limit=6`,m);return p.useEffect(()=>{(async()=>await t.mutate())()},[d]),t.isLoading||o.isLoading?a(y,{}):t.error||o.error?a(w,{}):s(x,{children:[a(v,{title:t.data.data.title,description:t.data.data.highlight,ogImage:t.data.data.cover}),a("main",{children:s(h,{as:"article",css:n`
            margin-top: 18px;
          `,children:[s("header",{children:[s("div",{"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",css:n`
                display: flex;
                justify-content: space-between;
                align-items: center;
              `,children:[a("h1",{style:{flexGrow:1},children:t.data.data.title}),s(r,{onMouseEnter:e=>{e.target.classList.contains("show")||e.target.click()},onMouseLeave:e=>{e.target.classList.contains("show")&&e.target.click()},children:[a(r.Toggle,{variant:"secondary",size:"sm",children:"Categories"}),a(r.Menu,{as:"ul",style:{padding:0,width:"auto"},children:t.data.data.categories.map((e,c)=>s(p.Fragment,{children:[c!=0&&a(r.Divider,{style:{margin:0}}),a(r.Item,{as:"li",style:{textAlign:"center",padding:0},onMouseOver:i=>{i.target.style.backgroundColor="transparent"},onMouseOut:i=>{i.target.style.backgroundColor="unset"},children:e})]},c))})]})]}),a(L,{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",src:t.data.data.cover,css:n`
                position: relative;
                max-width: 800px;
                width: 100%;
                display: block;
                margin: 10px auto;
                z-index: -1;
              `})]}),a("hr",{}),a("main",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:a(f,{html:t.data.data.content})}),a("hr",{}),a(P,{posts:o.data.data,header:a("h1",{className:"text-center",style:{marginBottom:"18px"},children:"CHECK OUT OUR OTHER POSTS!"})}),a("br",{})]})})]})}export{I as default};
