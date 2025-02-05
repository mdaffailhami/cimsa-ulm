import PageHeader from '../../components/PageHeader';
import OrganizationStructure from './OrganizationStructure';
import { fetchJSON } from '../../utils';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import { PageMeta } from '../../components/PageMeta';

export default function OfficialsPage() {
  const page = useSWR(`${endpoint}/api/page/officials`, fetchJSON);
  const officials = useSWR(`${endpoint}/api/official`, fetchJSON);

  if (page.isLoading || officials.isLoading) {
    return <LoadingPage />;
  }

  if (page.error || officials.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <PageMeta
        title='The Officials - CIMSA ULM'
        description='Meet the officials of CIMSA ULM. We are a team of dedicated and passionate individuals who work together to achieve our goals and make a positive impact in our community.'
      />
      <main>
        <PageHeader
          title='Meet the Officials'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
        />
        <OrganizationStructure officials={officials.data.data} />
      </main>
    </>
  );
}
