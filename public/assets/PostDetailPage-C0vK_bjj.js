import{E as u,u as c,e as g,f as m,r as p,a,j as s,c as r,G as h,C as f,I as i,H as x,F as y,L as v,l as w}from"./index-B3h34kAm.js";import{B as P}from"./BlogSection-DOyYBscW.js";import{P as C}from"./PageMeta-OG5JkBvn.js";import{I as L}from"./Image-D_gdhdAJ.js";import"./PrimaryButton-q3RlGYL-.js";import"./Card-D1SI2xDz.js";function S(){const{slug:d}=u(),t=c(`${g}/api/post/${d}`,m),o=c(`${g}/api/post?page=1&limit=6`,m);return p.useEffect(()=>{(async()=>await t.mutate())()},[d]),t.isLoading||o.isLoading?a(v,{}):t.error||o.error?a(w,{}):s(y,{children:[a(C,{title:t.data.data.title,description:t.data.data.highlight,ogImage:t.data.data.cover}),a(h,{styles:r`
          /* Resolve CKEditor inline image's text alignment */
          p img {
            vertical-align: bottom;
          }
        `}),a("main",{children:s(f,{as:"article",css:r`
            margin-top: 18px;
          `,children:[s("header",{children:[s("div",{"data-aos":"fade-left","data-aos-duration":"1200","data-aos-once":"true",css:r`
                display: flex;
                justify-content: space-between;
                align-items: center;
              `,children:[a("h1",{style:{flexGrow:1},children:t.data.data.title}),s(i,{onMouseEnter:e=>{e.target.classList.contains("show")||e.target.click()},onMouseLeave:e=>{e.target.classList.contains("show")&&e.target.click()},children:[a(i.Toggle,{variant:"secondary",size:"sm",children:"Categories"}),a(i.Menu,{as:"ul",style:{padding:0,width:"auto"},children:t.data.data.categories.map((e,l)=>s(p.Fragment,{children:[l!=0&&a(i.Divider,{style:{margin:0}}),a(i.Item,{as:"li",style:{textAlign:"center",padding:0},onMouseOver:n=>{n.target.style.backgroundColor="transparent"},onMouseOut:n=>{n.target.style.backgroundColor="unset"},children:e})]},l))})]})]}),a(L,{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",src:t.data.data.cover,css:r`
                position: relative;
                max-width: 800px;
                width: 100%;
                display: block;
                margin: 10px auto;
                z-index: -1;
              `})]}),a("hr",{}),a("main",{"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:a(x,{html:t.data.data.content})}),a("hr",{}),a(P,{posts:o.data.data,header:a("h1",{className:"text-center",style:{marginBottom:"18px"},children:"CHECK OUT OUR OTHER POSTS!"})}),a("br",{})]})})]})}export{S as default};
