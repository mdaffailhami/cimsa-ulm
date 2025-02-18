import{j as o,c as i,b as c,a,R as p,H as l,G as w,E as y,u as h,e as m,f as u,r as k,C as x,F as g,L as v,l as C}from"./index-BEyJHjE1.js";import{C as f}from"./Carousel-Djv8wjq5.js";import{I as $}from"./Image-CZAby9Cn.js";import{B as S}from"./BlogSection-BamfLLW_.js";import{P as I}from"./PrimaryButton-DxR9xqOZ.js";import{A as n}from"./Accordion-DbiGsBAn.js";import{C as E}from"./ContactCardSection-CAOS6RKB.js";import{P as j}from"./PageMeta-CdVBd3kD.js";import"./ElementChildren-DPRnfiba.js";import"./Card-D7rehrTn.js";function A({name:e,description:t,images:d}){return o(p,{as:"section","data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",xs:1,lg:2,css:i`
        display: flex;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `,children:[o(c,{children:[a("h1",{"data-aos":"fade-right","data-aos-once":"true","data-aos-duration":"1200",className:"display-4 fw-bold text-center",css:i`
            margin-top: 10px;
            @media (min-width: 992px) {
              margin-top: 0;
            }
          `,children:a("b",{children:e})}),a("hr",{style:{borderWidth:"3px",opacity:1}}),a("p",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",style:{color:"black"},children:t})]}),a(c,{children:a(f,{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",css:i`
            overflow: hidden;
            /* width: 1000px; */
            border-radius: 20px;
            /* flex-grow: 2; */

            @media (min-width: 992px) {
              border-radius: 24px;
            }
          `,children:d.map((r,s)=>a(f.Item,{children:a("img",{alt:`${e} image slide-${s+1}`,css:i`
                  width: 100%;
                  object-fit: cover;
                  height: 400px;
                  border-radius: 20px;
                `,src:r})},s))})})]})}function T({focuses:e,mission:t}){return o(p,{as:"section","data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",xs:1,lg:2,css:i`
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
      `,children:[a(b,{title:"MISSION STATEMENT",children:a("p",{children:t})}),a(b,{title:"AREAS OF FOCUS",children:a("ol",{children:e.map((d,r)=>o("li",{children:[r+1,". ",d]},r))})})]})}function b({title:e,children:t}){return o(c,{children:[a("h2",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",className:"fw-bold text-center",children:e}),a("hr",{style:{borderWidth:"2.8px",opacity:1}}),a("div",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",css:i`
          color: black;
          font-size: 18px;

          @media (min-width: 992px) {
            font-size: 20px;
          }
        `,children:t})]})}function M({testimonies:e,color:t}){return o("section",{"data-aos":"fade","data-aos-once":"true","data-aos-duration":"1200",css:i`
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `,children:[a("h2",{style:{textAlign:"center",color:"white",textShadow:`-1.5px -1.5px 0 ${t}, 1.5px -1.5px 0 ${t}, -1.5px 1.5px 0 ${t}, 1.5px 1.5px 0 ${t}`},children:a("b",{children:"TESTIMONIALS"})}),a("hr",{style:{borderWidth:"2.8px",opacity:1}}),e.map((d,r)=>a(B,{testimony:d,reverse:r%2===1,myCss:r%2===1?"":"margin-bottom: 22px;"},r))]})}function B({testimony:e,reverse:t=!1,myCss:d=""}){return o(p,{css:i`
        display: flex;
        flex-direction: ${t?"row-reverse":"row"};
        text-align: ${t?"right":"left"};

        ${d}
      `,children:[a(c,{xs:12,sm:5,lg:3,css:i`
          margin-bottom: 8px;
          @media (min-width: 592px) {
            margin-bottom: 0;
          }
        `,children:a($,{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",src:e.image,alt:"Testimony Picture",css:i`
            object-fit: cover;
            width: 100%;
            height: 400px;

            @media (min-width: 992px) {
              height: 232px;
            }
          `})}),o(c,{xs:12,sm:7,lg:9,children:[a("h3",{"data-aos":t?"fade-left":"fade-right","data-aos-once":"true","data-aos-duration":"1200",style:{marginBottom:0},children:a("b",{children:e.name||"-"})}),a("h6",{"data-aos":"zoom-in","data-aos-once":"true","data-aos-duration":"1200",style:{color:"gray"},children:e.position||"-"}),a("p",{"data-aos":"fade-up","data-aos-once":"true","data-aos-duration":"1200",style:{color:"black",textAlign:"justify"},children:a(l,{html:e.description||"-"})})]})]})}function L({name:e,color:t,activities:d}){return o("section",{"data-aos":"fade-left","data-aos-once":"true","data-aos-duration":"1200",css:i`
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
        `}),o("h2",{className:"text-center display-6",style:{marginBottom:"18px",color:t,fontWeight:"bold"},children:["UPCOMING ",e," ACTIVITY"]}),a("hr",{style:{borderWidth:"3px",opacity:1,color:t}}),o(n,{alwaysOpen:!0,children:[d.map((r,s)=>o(n.Item,{eventKey:s,children:[a(n.Header,{children:r.name}),a(n.Body,{as:"p",children:a(l,{html:r.description})})]},s)),o(n.Item,{eventKey:"0",children:[a(n.Header,{children:"Accordion Item #1"}),a(n.Body,{})]})]})]})}function K(){const{name:e}=y(),t=h(`${m}/api/committe/${e}`,u),d=h(`${m}/api/post?page=1&limit=3${`&category=${e}`}`,u);return k.useEffect(()=>{t.mutate(),d.mutate()},[e]),t.isLoading||d.isLoading?a(v,{}):t.error||d.error?a(C,{}):o(g,{children:[a(j,{title:`${t.data.data.name} - CIMSA ULM`,description:t.data.data.description}),o("main",{children:[a(w,{styles:i`
            ::selection {
              color: white;
              background-color: ${t.data.data.color};
            }
          `}),o("div",{css:i`
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
            `}),o(x,{css:i`
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
            `,children:[a(A,{name:t.data.data.name,description:a(l,{html:t.data.data.long_description}),images:t.data.data.galleries.map(r=>r.url)}),a(T,{focuses:t.data.data.focuses,mission:a(l,{html:t.data.data.mission_statement})}),a(M,{testimonies:t.data.data.testimonies,color:t.data.data.color})]})]}),a("hr",{}),a("br",{}),o(x,{children:[a(S,{posts:d.data.data,header:o(g,{children:[o("h2",{className:"text-center display-6",style:{marginBottom:"18px",color:t.data.data.color,fontWeight:"bold"},children:["RECENT ",t.data.data.name," ACTIVITY"]}),a("hr",{style:{borderWidth:"3px",opacity:1,color:t.data.data.color}})]}),footer:a("div",{className:"d-flex justify-content-center",children:a(I,{color:t.data.data.color,style:{display:"block",margin:"0 auto"},to:"/blog/all/1",children:a("b",{children:"Go to CIMSA Blog"})})})}),a("br",{}),a("br",{}),a(L,{name:t.data.data.name,color:t.data.data.color,activities:t.data.data.activities})]}),a("br",{}),a("hr",{}),a(E,{period:t.data.data.contact.generation,position:t.data.data.contact.occupation,picture:t.data.data.contact.image,name:t.data.data.contact.name,email:t.data.data.contact.email,phone:t.data.data.contact.phone})]})]})}export{K as default};
