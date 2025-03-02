import{j as i,a as o,Z as a}from"./index-BDacah9G.js";function p({title:n,description:t,ogImage:e=`${window.location.origin}/logo.png`}){return i(a,{children:[o("link",{rel:"canonical",href:window.location.href}),o("title",{children:n}),o("link",{rel:"icon",type:"image/png",href:`${window.location.origin}/favicon.png`}),o("meta",{name:"author",content:"CIMSA ULM"}),o("meta",{name:"description",content:t}),o("meta",{property:"og:title",content:n}),o("meta",{property:"og:type",content:"organization"}),o("meta",{property:"og:url",content:window.location.href}),o("meta",{property:"og:image",content:e}),o("meta",{property:"og:description",content:t}),o("script",{type:"application/ld+json",children:`
              {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "${n}",
                "url": "${window.location.href}",
                "description": "${t}",
                "publisher": {
                  "@type": "Organization",
                  "name": "CIMSA ULM",
                  "logo": "${window.location.origin}/logo.png"
                }
              }
            `})]})}export{p as P};
