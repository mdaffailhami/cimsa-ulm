import { useEffect, useState } from 'react';
import { endpoint } from '../../configs';
import { setPageMeta } from '../../utils';
import LoadingIndicator from '../LoadingIndicator';
import MainSection from './MainSection';
import NationalMeetingsSection from './NationalMeetingsSection';

export default function ActivitiesPage() {
  setPageMeta(
    'Activities - CIMSA ULM',
    'Explore our various activities like our programs & our trainings and national meetings at CIMSA ULM.'
  );

  const [pageData, setPageData] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/activities`);
        const data = await res.json();

        if (!data) throw new Error('Error fetching data');

        setPageData(data);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData) {
    return <LoadingIndicator />;
  }

  const { contents } = pageData;

  return (
    <div style={{ lineHeight: '1.7' }}>
      <MainSection
        programs={
          contents.find((x) => x.column === 'programs-description').text_content
        }
        trainings={
          contents.find((x) => x.column === 'trainings-description')
            .text_content
        }
      />
      <br />
      <br />
      <NationalMeetingsSection
        nationalMeetingsDesc={
          contents.find((x) => x.column === 'national-meetings-description')
            .text_content
        }
        nationalMeetingsEmbeddedYoutubeUrl={
          contents.find(
            (x) => x.column === 'national-meetings-embedded-youtube-url'
          ).text_content
        }
        becomeDelegatesUrl={
          contents.find((x) => x.column === 'become-delegates-url').text_content
        }
      />
    </div>
  );
}
