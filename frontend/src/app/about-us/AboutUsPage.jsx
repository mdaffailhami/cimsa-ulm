import PageHeader from '../../components/PageHeader';
import SDGsSection from './SDGsSection';
import IFMSASection from './IFMSASection';
import VisionMissionSection from './VisionMissionSection';
import { fetchJSON, setPageMeta } from '../../utils';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import PageMeta from '../../components/PageMeta';
import SDG3 from '../../assets/sdg-3.png';
import SDG4 from '../../assets/sdg-4.png';
import SDG5 from '../../assets/sdg-5.png';
import SDG13 from '../../assets/sdg-13.png';

export default function AboutUsPage() {
  const page = useSWR(`${endpoint}/api/page/about-us`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <PageMeta
        title='About Us - CIMSA ULM'
        description='Center for Indonesian Medical Students’ Activities is a non-profit, non- government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects.'
      />
      <main>
        <PageHeader
          title='About Us'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
        />
        <SDGsSection
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'sdgs-description')
                  .long_text_content
              }
            />
          }
          // sdgs={page.data.contents
          //   .find((x) => x.column === 'sdgs')
          //   .galleries.map((x) => x.url)}
          sdgs={[SDG3, SDG4, SDG5, SDG13]}
        />
        <IFMSASection
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'ifmsa-description')
                  .long_text_content
              }
            />
          }
        />
        <VisionMissionSection
          description={
            <HtmlParser
              html={
                page.data.contents.find(
                  (x) => x.column === 'vision-mission-description'
                ).long_text_content
              }
            />
          }
          vision={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'vision')
                  .long_text_content
              }
            />
          }
          missions={JSON.parse(
            page.data.contents.find((x) => x.column === 'missions')
              .multiple_value_content
          )}
        />
        <hr />
      </main>
    </>
  );
}
