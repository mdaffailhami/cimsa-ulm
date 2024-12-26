import { Container, Row, Col, Form, Button } from 'react-bootstrap';
import Navbar from '../Navbar';
import Footer from '../Footer';
import LocationSection from './LocationSection';
import ContactForm from './ContactForm';
import PageHeader from '../PageHeader';
import { useLocation } from 'react-router';
import { useEffect } from 'react';
import SocmedsSection from './SocmedsSection';
import OfficialCardSection from '../OfficialCardSection';

export default function ContactUsPage() {
  const location = useLocation();

  useEffect(() => {
    // Detect hash in URL, if there is a hash then scroll to that section
    if (location.hash) {
      const element = document.querySelector(location.hash);

      if (element) {
        window.scrollTo(0, element.offsetTop - 80);
      }
    }
  }, [location]);

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
      <LocationSection />
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
