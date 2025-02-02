import { Container } from 'react-bootstrap';
import PageHeader from '../../components/PageHeader';
import PostsSection from './PostsSection';
import SocmedsSection from '../../components/SocmedsSection';
import ContactCardSection from '../../components/ContactCardSection';
import { fetchJSON, getWebPaths, setPageMeta } from '../../utils';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import LoadFailedPage from '../../components/LoadFailedPage';

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

  const page = useSWR(`${endpoint}/api/page/blog`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <Container>
        <PageHeader
          title={'BLOG'}
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
        />
        <PostsSection totalPage={totalPage} />
      </Container>
      <br />
      <SocmedsSection />
      <br />
      <ContactCardSection
        period={page.data.contact.generation}
        position={page.data.contact.occupation}
        picture={page.data.contact.image}
        name={page.data.contact.name}
        email={page.data.contact.email}
        phone={page.data.contact.phone}
      />
    </>
  );
}
