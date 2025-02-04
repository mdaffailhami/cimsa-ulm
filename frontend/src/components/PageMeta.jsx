import { Helmet } from 'react-helmet-async';

export function PageMeta({
  title,
  description,
  ogImage = `${window.location.origin}/logo.png`,
}) {
  return (
    <Helmet>
      <link rel='canonical' href={window.location.href} />

      <title>{title}</title>
      <link
        rel='icon'
        type='image/png'
        href={`${window.location.origin}/favicon.png`}
      />
      <meta name='author' content='CIMSA ULM' />
      <meta name='description' content={description} />

      <meta property='og:title' content={title} />
      <meta property='og:type' content='organization' />
      <meta property='og:url' content={window.location.href} />
      <meta property='og:image' content={ogImage} />
      <meta property='og:description' content={description} />

      <script type='application/ld+json'>
        {`
              {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "${title}",
                "url": "${window.location.href}",
                "description": "${description}",
                "publisher": {
                  "@type": "Organization",
                  "name": "CIMSA ULM",
                  "logo": "${window.location.origin}/logo.png"
                }
              }
            `}
      </script>
    </Helmet>
  );
}
