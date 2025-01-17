import { Container } from 'react-bootstrap';
import PageHeader from '../PageHeader';
import PostsSection from './PostsSection';
import SocmedsSection from '../SocmedsSection';
import OfficialCardSection from '../OfficialCardSection';
import { getWebPaths, setPageMeta } from '../../utils';
import LoadingIndicator from '../LoadingIndicator';
import { endpoint } from '../../configs';
import { useEffect, useState } from 'react';
import HtmlParser from '../HtmlParser';

export default function BlogPage() {
  setPageMeta(
    'BLOG - CIMSA ULM',
    'Content from our members, seniors, alumni, and activity reports.'
  );

  const paths = getWebPaths();
  const totalPage = 28;

  // if paths is not /blog/<category>/<page>
  if (paths.length != 3) {
    window.history.replaceState({}, '', `/blog/all/1`);
  }

  // only allow paths[1] as 'all', 'articles', or 'activities'
  if (paths[1] != 'all' && paths[1] != 'articles' && paths[1] != 'activities') {
    window.history.replaceState({}, '', `/blog/all/${paths[2]}`);
  }

  // only allow paths[2] as number
  if (isNaN(parseInt(paths[2]))) {
    window.history.replaceState({}, '', `/blog/${paths[1]}/1`);
  }

  // if paths[2] < 1
  if (parseInt(paths[2]) < 1) {
    window.history.replaceState({}, '', `/blog/${paths[1]}/1`);
  }

  const [pageData, setPageData] = useState(null);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/blog`);

        setPageData(await res.json());
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData) {
    return <LoadingIndicator />;
  }

  const { contents, contact } = pageData;

  return (
    <>
      <Container>
        <PageHeader
          title={'BLOG'}
          description={
            <HtmlParser
              html={
                contents.find((x) => x.column === 'description').text_content
              }
            />
          }
        />
        <PostsSection totalPage={totalPage} />
      </Container>
      <br />
      <SocmedsSection />
      <br />
      <OfficialCardSection
        period={contact.generation}
        position={contact.occupation}
        picture={contact.image}
        name={contact.name}
        email={contact.email}
        phone={contact.phone}
      />
    </>
  );
}
