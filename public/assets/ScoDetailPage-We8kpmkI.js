import{j as e,c as i,b as s,a,R as p,H as l,G as w,E as y,u as h,e as m,f as u,r as k,C as x,F as g,L as v,l as C}from"./index-BDacah9G.js";import{C as b}from"./Carousel-DPU4Udws.js";import{I as $}from"./Image-C1IGWyv_.js";import{B as S}from"./BlogSection-J6zbLmM5.js";import{P as E}from"./PrimaryButton-BkYAsUlW.js";import{A as c}from"./Accordion-jrbE7zK-.js";import{C as I}from"./ContactCardSection-SQXea21d.js";import{P as j}from"./PageMeta-fADpcX7y.js";import"./ElementChildren-VGQ-vzbP.js";import"./Card-X6RVUTRt.js";function A({name:o,description:t,images:d}){return e(p,{as:"section","data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",xs:1,lg:2,css:i`
        display: flex;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `,children:[e(s,{children:[a("h1",{"data-aos":"fade-right","data-aos-once":"true","data-aos-duration":"1200",className:"display-4 fw-bold text-center",css:i`
            margin-top: 10px;
            @media (min-width: 992px) {
              margin-top: 0;
            }
          `,children:a("b",{children:o})}),a("hr",{style:{borderWidth:"3px",opacity:1}}),a("p",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",style:{color:"black"},children:t})]}),a(s,{children:a(b,{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",css:i`
            overflow: hidden;
            /* width: 1000px; */
            border-radius: 20px;
            /* flex-grow: 2; */

            @media (min-width: 992px) {
              border-radius: 24px;
            }
          `,children:d.map((r,n)=>a(b.Item,{children:a("img",{alt:`${o} image slide-${n+1}`,css:i`
                  width: 100%;
                  object-fit: cover;
                  height: 400px;
                  border-radius: 20px;
                `,src:r})},n))})})]})}function T({focuses:o,mission:t}){return e(p,{as:"section","data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",xs:1,lg:2,css:i`
        display: flex;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;

        gap: 24px;
        padding-top: 23px;
        @media (min-width: 992px) {
          gap: 0;
        }
      `,children:[a(f,{title:"MISSION STATEMENT",children:a("p",{children:t})}),a(f,{title:"AREAS OF FOCUS",children:a("ol",{children:o.map((d,r)=>e("li",{children:[r+1,". ",d]},r))})})]})}function f({title:o,children:t}){return e(s,{children:[a("h2",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",className:"fw-bold text-center",children:o}),a("hr",{style:{borderWidth:"2.8px",opacity:1}}),a("div",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",css:i`
          color: black;
          font-size: 18px;

          @media (min-width: 992px) {
            font-size: 20px;
          }
        `,children:t})]})}function M({testimonies:o,color:t}){return e("section",{"data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",css:i`
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `,children:[a("h2",{style:{textAlign:"center",color:"white",textShadow:`-1.5px -1.5px 0 ${t}, 1.5px -1.5px 0 ${t}, -1.5px 1.5px 0 ${t}, 1.5px 1.5px 0 ${t}`},children:a("b",{children:"TESTIMONIALS"})}),a("hr",{style:{borderWidth:"2.8px",opacity:1}}),o.map((d,r)=>a(B,{testimony:d,reverse:r%2===1,myCss:r%2===1?"":"margin-bottom: 22px;"},r))]})}function B({testimony:o,reverse:t=!1,myCss:d=""}){return e(p,{css:i`
        display: flex;
        flex-direction: ${t?"row-reverse":"row"};
        text-align: ${t?"right":"left"};

        ${d}
      `,children:[a(s,{xs:12,sm:5,lg:3,css:i`
          margin-bottom: 8px;
          @media (min-width: 592px) {
            margin-bottom: 0;
          }
        `,children:a($,{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",src:o.image,alt:"Testimony Picture",css:i`
            object-fit: cover;
            width: 100%;
            height: 400px;

            @media (min-width: 992px) {
              height: 232px;
            }
          `})}),e(s,{xs:12,sm:7,lg:9,children:[a("h3",{"data-aos":t?"fade-left":"fade-right","data-aos-once":"true","data-aos-duration":"1200",style:{marginBottom:0},children:a("b",{children:o.name||"-"})}),a("h6",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",style:{color:"gray"},children:!o.position||!o.batch?"-":`${o.position} Batch ${o.batch}`}),a("p",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",style:{color:"black",textAlign:"justify"},children:a(l,{html:o.description||"-"})})]})]})}function L({name:o,color:t,activities:d}){return e("section",{"data-aos":"fade-left","data-aos-once":"true","data-aos-duration":"1200",css:i`
        max-width: 962px;
        margin: 0 auto;
      `,children:[a(w,{styles:i`
          .accordion-button {
            background-color: ${t};
            color: white;
            font-weight: bold;
            border: 1px solid white;
            /* text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black,
            -0.5px 0.5px 0 black, 0.5px 0.5px 0 black; */
          }

          .accordion-button:not(.collapsed) {
            background-color: ${t};
            color: white;
          }

          .accordion-button::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 5L8 11L14 5'/%3E%3C/svg%3E");
          }

          .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 5L8 11L14 5'/%3E%3C/svg%3E");
          }

          .accordion-button:focus {
            box-shadow: none;
            border-color: white;
          }
        `}),e("h2",{className:"text-center display-6",style:{marginBottom:"18px",color:t,fontWeight:"bold"},children:["UPCOMING ",o," ACTIVITY"]}),a("hr",{style:{borderWidth:"3px",opacity:1,color:t}}),a(c,{alwaysOpen:!0,children:d.map((r,n)=>e(c.Item,{eventKey:n,children:[a(c.Header,{children:r.name}),a(c.Body,{as:"p",children:a(l,{html:r.description})})]},n))})]})}function V(){const{name:o}=y(),t=h(`${m}/api/committe/${o}`,u),d=h(`${m}/api/post?page=1&limit=3&category=${o}`,u);return k.useEffect(()=>{t.mutate(),d.mutate()},[o]),t.isLoading||d.isLoading?a(v,{}):t.error||d.error?a(C,{}):e(g,{children:[a(j,{title:`${t.data.data.name} - CIMSA ULM`,description:t.data.data.description}),e("main",{children:[a(w,{styles:i`
            ::selection {
              color: white;
              background-color: ${t.data.data.color};
            }
          `}),e("div",{css:i`
            background-image: url(${t.data.data.background});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* height: 100vh; */
            position: relative;
            display: flex;
            justify-content: center;
            color: ${t.data.data.color};
          `,children:[a("div",{css:i`
              position: absolute;
              width: 100%;
              height: 100%;
              background: linear-gradient(
                to top,
                ${t.data.data.color},
                rgba(255, 255, 255, 0)
              );
            `}),e(x,{css:i`
              position: relative;
              max-width: 962px;
              z-index: 10;
              display: flex;
              justify-content: center;
              flex-direction: column;
              gap: 32px;
              padding: 24px;

              @media (min-width: 768px) {
                padding: 40px;
              }

              @media (min-width: 992px) {
                padding: 40px 0;
              }
            `,children:[a(A,{name:t.data.data.name,description:a(l,{html:t.data.data.long_description}),images:t.data.data.galleries.map(r=>r.url)}),a(T,{focuses:t.data.data.focuses,mission:a(l,{html:t.data.data.mission_statement})}),a(M,{testimonies:t.data.data.testimonies,color:t.data.data.color})]})]}),a("hr",{}),a("br",{}),e(x,{children:[a(S,{posts:d.data.data,header:e(g,{children:[e("h2",{className:"text-center display-6",style:{marginBottom:"18px",color:t.data.data.color,fontWeight:"bold"},children:["RECENT ",t.data.data.name," ACTIVITY"]}),a("hr",{style:{borderWidth:"3px",opacity:1,color:t.data.data.color}})]}),footer:a("div",{className:"d-flex justify-content-center",children:a(E,{color:t.data.data.color,style:{display:"block",margin:"0 auto"},to:"/blog/all/1",children:a("b",{children:"Go to CIMSA Blog"})})})}),a("br",{}),a("br",{}),a(L,{name:t.data.data.name,color:t.data.data.color,activities:t.data.data.activities})]}),a("br",{}),a("hr",{}),a(I,{period:t.data.data.contact.generation,position:t.data.data.contact.occupation,picture:t.data.data.contact.image,name:t.data.data.contact.name,email:t.data.data.contact.email,phone:t.data.data.contact.phone})]})]})}export{V as default};
