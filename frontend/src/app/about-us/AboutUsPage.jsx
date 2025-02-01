import PageHeader from '../../components/PageHeader';
import SDGsSection from './SDGsSection';
import IFMSASection from './IFMSASection';
import VisionMissionSection from './VisionMissionSection';
import { fetchJSON, setPageMeta } from '../../utils';
import { useEffect, useState } from 'react';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';

export default function AboutUsPage() {
  setPageMeta(
    'About Us - CIMSA ULM',
    'Center for Indonesian Medical Students’ Activities is a non-profit, non- government, and non-politic organization facilitating medical students of Indonesia who intend to make great impacts on our nation’s health with activity-based projects.'
  );

  const page = useSWR(`${endpoint}/api/page/about-us`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <PageHeader
        title='About Us'
        description={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'description')
                .text_content
            }
          />
        }
      />
      <SDGsSection
        description={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'sdgs-description')
                .text_content
            }
          />
        }
        sdgs={page.data.contents
          .find((x) => x.column === 'sdgs')
          .galleries.map((x) => x.url)}
      />
      <IFMSASection
        description={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'ifmsa-description')
                .text_content
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
              ).text_content
            }
          />
        }
        vision={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'vision').text_content
            }
          />
        }
        missions={JSON.parse(
          page.data.contents.find((x) => x.column === 'missions').text_content
        )}
      />
      <hr />
    </>
  );
}
