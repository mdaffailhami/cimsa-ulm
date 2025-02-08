import PageHeader from '../../components/PageHeader';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import LoadFailedPage from '../../components/LoadFailedPage';
import HtmlParser from '../../components/HtmlParser';
import { fetchJSON } from '../../utils';
import ScosList from './ScosList';
import useSWR from 'swr';
import PageMeta from '../../components/PageMeta';

export default function ScosPage() {
  const page = useSWR(`${endpoint}/api/page/scos`, fetchJSON);
  const scos = useSWR(
    `${endpoint}/api/committe`,
    async (url) => (await fetchJSON(url)).data
  );

  if (page.isLoading || scos.isLoading) {
    return <LoadingPage />;
  }

  if (page.error || scos.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <PageMeta
        title='The SCOs - CIMSA ULM'
        description='We organize our work through Standing Committees that represent focus areas of equal importance in order to maintain a balanced, holistic, and steady approach towards our targets and goals.'
      />
      <main>
        <PageHeader
          title='Standing Committees'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
        />
        <hr style={{ color: 'red', borderWidth: '1px', opacity: '1' }} />
        <ScosList scos={scos.data} />
        <br />
      </main>
    </>
  );
}
