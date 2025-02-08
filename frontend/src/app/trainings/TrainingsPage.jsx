import ContactCardSection from '../../components/ContactCardSection';
import PageHeader from '../../components/PageHeader';
import OurTrainersSection from './OurTrainersSection';
import { fetchJSON } from '../../utils';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import PageMeta from '../../components/PageMeta';

export default function TrainingsPage() {
  const page = useSWR(`${endpoint}/api/page/trainings`, fetchJSON);
  const trainers = useSWR(`${endpoint}/api/training`, fetchJSON);

  if (page.isLoading || trainers.isLoading) return <LoadingPage />;
  if (page.error || trainers.error) return <LoadFailedPage />;

  return (
    <>
      <PageMeta
        title='Trainings - CIMSA ULM'
        description='CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics.'
      />
      <main>
        <PageHeader
          title='Our Trainings'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
        />
        <OurTrainersSection
          description={
            <HtmlParser
              html={
                page.data.contents.find(
                  (x) => x.column === 'trainers-description'
                ).long_text_content
              }
            />
          }
          trainers={trainers.data.data}
        />
        <hr />
        <ContactCardSection
          period={page.data.contact.generation}
          position={page.data.contact.occupation}
          picture={page.data.contact.image}
          name={page.data.contact.name}
          email={page.data.contact.email}
          phone={page.data.contact.phone}
        />
      </main>
    </>
  );
}
