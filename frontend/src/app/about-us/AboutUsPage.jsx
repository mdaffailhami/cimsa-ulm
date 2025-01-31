import PageHeader from '../../components/PageHeader';
import SDGsSection from './SDGsSection';
import IFMSASection from './IFMSASection';
import VisionMissionSection from './VisionMissionSection';
import { setPageMeta } from '../../utils';
import { useEffect, useState } from 'react';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';

export default function AboutUsPage() {
  setPageMeta(
    'About Us - CIMSA ULM',
    'Center for Indonesian Medical Students’ Activities is a non-profit, non- government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects.'
  );

  const [pageData, setPageData] = useState(undefined);

  useEffect(() => {
    (async () => {
      try {
        // await new Promise((resolve) => setTimeout(resolve, 3000));
        const res = await fetch(`${endpoint}/api/page/about-us`);
        const data = await res.json();

        if (!data) throw new Error('Error fetching data');

        setPageData(data);
      } catch (error) {
        alert(error);
      }
    })();
  }, []);

  if (!pageData) return <LoadingPage />;

  return (
    <>
      <PageHeader
        title='About Us'
        description={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'description')
                .text_content
            }
          />
        }
      />
      <SDGsSection
        description={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'sdgs-description')
                .text_content
            }
          />
        }
        sdgs={pageData.contents
          .find((x) => x.column === 'sdgs')
          .galleries.map((x) => x.url)}
      />
      <IFMSASection
        description={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'ifmsa-description')
                .text_content
            }
          />
        }
      />
      <VisionMissionSection
        description={
          <HtmlParser
            html={
              pageData.contents.find(
                (x) => x.column === 'vision-mission-description'
              ).text_content
            }
          />
        }
        vision={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'vision').text_content
            }
          />
        }
        missions={JSON.parse(
          pageData.contents.find((x) => x.column === 'missions').text_content
        )}
      />
      <hr />
    </>
  );
}
