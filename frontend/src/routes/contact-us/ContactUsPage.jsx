import { Container } from 'react-bootstrap';
import MapSection from './MapSection';
import ContactForm from './ContactForm';
import PageHeader from '../PageHeader';
import { useLocation } from 'react-router';
import { useEffect } from 'react';
import SocmedsSection from './SocmedsSection';
import OfficialCardSection from '../OfficialCardSection';
import { scrollById } from '../../utils';

export default function ContactUsPage() {
  document.title = 'Contact Us - CIMSA ULM';
  const location = useLocation();

  useEffect(() => scrollById(location.hash), [location]);

  return (
    <>
      <Container style={{ paddingTop: '100px' }}>
        <PageHeader
          title='Contact Us'
          description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at sint
        fugit repudiandae consequuntur? Quidem eligendi aspernatur nisi debitis
        autem? Praesentium, dolorem voluptatibus cupiditate esse ratione
        repudiandae aut doloremque delectus.'
        />
        <br />
        <ContactForm />
        <br />
        <hr />
        <br />
      </Container>
      <MapSection />
      <br />
      <br />
      <SocmedsSection />
      <br />
      <br />
      <OfficialCardSection
        period={'2024-2025'}
        position={'Vice Local Coordinator'}
        picture={'https://avatars.githubusercontent.com/u/74972129?v=4'}
        // picture={
        //   'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
        // }
        // picture={
        //   'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2024/07/LOME_Daniella-Enjelika-Sinaga-e1721380348578-300x300.png'
        // }
        name={'Muhammad Daffa Ilhami'}
        email={'mdaffailhami@gmail.com'}
        phone={'+62 812-3456-7890'}
      />
    </>
  );
}
