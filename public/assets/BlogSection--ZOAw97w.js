import{j as r,c as o,a as e,R as g,C as h,G as m,W as p,g as x,b as u,F as b}from"./index-DCLDiFRd.js";import{P as f}from"./PrimaryButton-DYlDaI4X.js";import{C as a}from"./Card-DW0sDjW-.js";import{I as v}from"./Image-B-EGQ7HO.js";function O({posts:n,header:i=null,includeEndDivider:s=!1,footer:l=null,aos:d="fade-right"}){return r(h,{as:"section","data-aos":d,"data-aos-once":"true","data-aos-duration":"1200",css:o`
        padding-left: 24px;
        padding-right: 24px;

        @media (min-width: 992px) {
          padding-left: 100px;
          padding-right: 100px;
        }
      `,children:[i||e("h2",{css:o`
                margin-top: 0;
                margin-bottom: 18px;
                text-align: center;
                font-size: calc(1.375rem + 1.5vw);
                font-weight: 500;
                line-height: 1.2;
                color: var(--bs-heading-color);
              `,children:"CHECK OUT OUR LATEST UPDATES!"}),e(g,{className:"d-flex justify-content-center",children:n.map((t,c)=>e(y,{thumbnail:t.cover,title:t.title,description:t.highlight,date:t.updated_at,url:`/blog/detail/${t.slug}`},c))}),l||e("div",{className:"d-flex justify-content-center",children:e(f,{style:{display:"block",margin:"0 auto"},to:"/blog/all/1",children:"See All Posts"})}),s&&e("hr",{})]})}function y({thumbnail:n,title:i,description:s,date:l,url:d,reloadDocument:t}){return r(b,{children:[e(m,{styles:o`
          .blog-card:hover .blog-card-title {
            text-decoration: underline;
          }
        `}),e(u,{className:"blog-card",xs:12,sm:12,md:6,lg:6,xl:4,style:{marginBottom:"24px"},"data-aos":"fade","data-aos-duration":"1200","data-aos-once":"true",children:r(a,{as:p,to:d,reloadDocument:t,css:o`
            height: 419px;
            text-decoration: none;
            overflow: hidden;

            ${x(1.05)}
          `,children:[r(a.Header,{style:{position:"relative",padding:"0",height:"250px"},children:[e(v,{src:n,alt:i,style:{objectFit:"cover",width:"100%",height:"100%"}}),e("div",{css:o`
                position: absolute;
                bottom: 5px;
                right: 5px;
                padding: 4px;
                background-color: rgba(0, 0, 0, 0.57);
                border-radius: 8px;
                color: white;
                font-size: 13px;
              `,children:new Intl.DateTimeFormat("en-US",{month:"long",day:"numeric",year:"numeric"}).format(new Date(l))})]}),r(a.Body,{children:[e(a.Title,{className:"blog-card-title",style:{fontSize:"23px",overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:2,WebkitBoxOrient:"vertical"},children:i}),e(a.Text,{style:{overflow:"hidden",textOverflow:"ellipsis",display:"-webkit-box",WebkitLineClamp:3,WebkitBoxOrient:"vertical"},children:s})]})]})})]})}export{O as B};
